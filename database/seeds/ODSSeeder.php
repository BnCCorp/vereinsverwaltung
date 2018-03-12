<?php

require 'vendor/autoload.php';

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ODSSeeder extends Seeder
{
    protected $filename;

    protected $filepath;

    private $excludes = ['migrations', 'password_resets', 'users'];

    public function __construct()
    {
        $this->filename = 'seeding.ods';
        $this->filepath = database_path('files/' . $this->filename);
    }

    public function run()
    {
        $this->parseFile();
    }

    private function parseFile()
    {
        // check if file exists and is readable
        if (!file_exists($this->filepath) || !is_readable($this->filepath))
        {
            trigger_error(sprintf("Error parsing file %s. The file does not exist or is not readable.",
                $this->filepath));

            return false;
        }

        // get all table names from the database
        $tableNames = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        // load the ods file
        $spreadsheet = IOFactory::load($this->filepath);

        // get all names of the sheets in the file
        $sheetNames = $spreadsheet->getSheetNames();

//        $a = $spreadsheet->getSheet(0)->getCellByColumnAndRow(5, 2)->getDataType();
//        var_dump($a);

        // loop over all sheets
        for ($i=0; $i<count($sheetNames); $i++)
        {
            // get the name of the sheet
            $sheetName = $sheetNames[$i];

            // check if there is a database table with the same name
            if (!in_array($sheetName, $tableNames))
            {
                trigger_error(sprintf("Error parsing sheet '%s' in file '%s'.\nThere is no database table with name '%s'.",
                    $sheetName, $this->filepath, $sheetName));

                continue;
            }

            // remove the table name, so we can track unseeded tables and raise a warning in the end
            $this->array_delete_value($tableNames, $sheetName);

            // delete all entries in specific database table
            DB::table($sheetName)->delete();

            // get the data from the sheet
            $seedData = $this->parseSheet($spreadsheet, $sheetName);

            // if there were no errors parsing the values insert them in the databse
            if ($seedData)
            {
                print sprintf("\e[38;5;2m%s:\e[0m %d records seeded\n", $sheetName, count($seedData));
                DB::table($sheetName)->insert($seedData);
            }
        }

        // loop over all remaining databse tables and raise an warning that they were not seeded
        foreach ($tableNames  as $tableName)
        {
            if (in_array($tableName, $this->excludes))
                continue;

            // raise a warning
            $this->print_warning(sprintf("There is no sheet '%s' in file '%s'. The database table with name '%s' will not be seeded!",
                $tableName, $this->filepath, $tableName));
        }
    }

    private function parseSheet($spreadsheet, $sheetName)
    {
        // get sheet from file
        $sheet = $spreadsheet->getSheetByName($sheetName);

        // number of rows and columns
        $columnCountString = $sheet->getHighestColumn();
        $columnCount = Coordinate::columnIndexFromString($columnCountString);
        $rowCountString = $sheet->getHighestRow();
        $rowCount = intval($rowCountString);

        if ($rowCount == 1 && $columnCount == 1 &&
            $sheet->getCellByColumnAndRow(1, 1)->getValue() == null)
        {
            $rowCount = 0;
            $columnCount = 0;
        }

        if ($rowCount == 0 || $columnCount == 0)
        {
            return false;
        }

        // parse header
        $header = [];
        for ($i=1; $i<=$columnCount; $i++)
        {
            $headerValue = $sheet->getCellByColumnAndRow($i, 1)->getValue();

            if ($headerValue == null || ctype_space($headerValue))
            {
                trigger_error(sprintf("Error parsing sheet '%s' in file '%s'.\n" .
                    "Column %d does not contain a header.", $sheetName, $this->filepath, $i), E_USER_ERROR);
                return false;
            }

            array_push($header, $headerValue);
        }

        // created_at field
        array_push($header, "created_at");

        // updated_at field
        array_push($header, "updated_at");

        // array to save data in
        $data = [];

        for ($row=2; $row<=$rowCount; $row++)
        {
            // array to save data from each row
            $rowData = [];

            for ($col=1; $col<=$columnCount; $col++)
            {
                $cell = $sheet->getCellByColumnAndRow($col, $row);

                $type = $cell->getDataType();
                $value = $cell->getValue();
                $formattedValue = $cell->getFormattedValue();

                switch ($type)
                {
                    // string
                    case "s":
                        break;

                    // some kind of number
                    case "n":
                        // int
                        if (filter_var($formattedValue, FILTER_VALIDATE_INT))
                        {
                            $formattedValue = intval($formattedValue);
                        }
                        // float
                        else if (filter_var($formattedValue, FILTER_VALIDATE_FLOAT))
                        {
                            $formattedValue = floatval($formattedValue);
                        }
                        // amount $xx.yy
                        else if (filter_var($formattedValue, FILTER_VALIDATE_REGEXP,
                            ["options" => ["regexp" => '/\$-?([0-9]|,)+.[0-9]{2}\s*/']]))
                        {
                            $formattedValue = floatval(str_replace(',', '', (trim(substr($formattedValue, 1)))));
                        }
                        //date
                        else if (filter_var($formattedValue, FILTER_VALIDATE_REGEXP,
                            ["options" => ["regexp" => '/(0?[1-9]|[12][0-9]|3[01])-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dez)-[0-9]{2}/']]))
                        {
                            $formattedValue = new Carbon($formattedValue);
                        }
                }

                // check if value is null
                if ($value !== null)
                    $value = $formattedValue;

                // save value in array
                array_push($rowData, $value);
            }

            // created_at field
            array_push($rowData, Carbon::now());

            // updated_at field
            array_push($rowData, Carbon::now());

            // combine row in data array
            $data[] = array_combine($header, $rowData);
        }

        return $data;
    }

    private function array_delete_value(&$array, $value)
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }
    }

    private function print_warning($message)
    {
        print "\n\e[33mWARNING: " . $message . "\e[0m\n";
    }

}