<?php

namespace App\Http\Controllers;

use App\FinanceAccount;
use App\FinanceCategory;
use App\FinanceTag;
use App\FinanceTransaction;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Session;

class FinanceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = FinanceTransaction::all();
        return view('finance.transactions.index')->with('transactions', $transactions);
    }

    public function bonus()
    {
        $transaction = new FinanceTransaction();
        $transaction->purpose = "Aufwandsentschädigung NAME nach Antrag von DATUM";
        $var = DB::table('finance_categories')->where("name", "=", "Aufwandsentschädigung")->first();
//        echo '<script>console.log('. json_encode($var->id) .')</script>';
        $transaction->finance_category_id = $var->id;
//        echo '<script>console.log('. json_encode(FinanceCategory::find($transaction->finance_category_id)->name) .')</script>';
        $transaction->type = "Ausgabe";

        $categories = FinanceCategory::pluck('name', 'id');
        $accounts = FinanceAccount::pluck('name', 'id');
        $members = Member::pluck('lastname', 'id');
        $tags = FinanceTag::pluck('name', 'id');
        return view('finance.transactions.create')
            ->with('transaction', $transaction)
            ->with('categories', $categories)
            ->with('accounts', $accounts)
            ->with('members', $members)
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FinanceCategory::pluck('name', 'id');
        $accounts = FinanceAccount::pluck('name', 'id');
        $members = Member::pluck('lastname', 'id');
        $tags = FinanceTag::pluck('name', 'id');
        return view('finance.transactions.create')
            ->with('categories', $categories)
            ->with('accounts', $accounts)
            ->with('members', $members)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'invoicedate' => 'bail|required|date|before_or_equal:paydate',
                'paydate' => 'bail|date|required',
                'purpose' => 'bail|required|string|max:191',
                'finance_account_id' => 'bail|required',
                'amount' => 'bail|required|regex:/^\d*(\.\d{1,2})?$/', /*Nur Geldwerte vom Typ zb 123.45*/
                'finance_category_id' => 'bail|required',
                'receiptnumber' => 'bail|required|string|max:10|unique:finance_transactions|regex:/^20\d{2}\-\d{3}$/', /*Nur Belegnummern im Format zb 2018-001*/
                'member_id' => 'bail|required',
                'type' => ['bail', 'required', Rule::in(['Ausgabe', 'Einnahme'])],
                "tag_id" => 'array',
            ],
            [
                'invoicedate.required' => 'Das Rechungsdatum darf nicht leer sein!',
                'invoicedate.date'      => 'Das Rechungsdatum muss ein Datum sein!',
                'invoicedate.max'      => 'Das Rechungsdatum darf höchstens 191 Zeichen enthalten!',
                'invoicedate.before_or_equal' => 'Das Rechungsdatum darf nicht später als das Bezahldatum sein!',
                'paydate.required' => 'Das Bezahldatum darf nicht leer sein!',
                'paydate.date'      => 'Das Bezahldatum muss ein Datum sein!',
                'purpose.required' => 'Der Zweck darf nicht leer sein!',
                'purpose.max'      => 'Der Zweck darf höchstens 191 Zeichen enthalten!',
                'purpose.string'      => 'Der Zweck muss eine Zeichenkette sein!',
                'finance_account_id.required' => 'Der Das Konto darf nicht leer sein!',
                'amount.required' => 'Der Betrag darf nicht leer sein!',
                'amount.regex' => 'Der Betrag muss ein Geldbetrag sein! Trennzeichen ist der Punkt.',
                'finance_category_id.required' => 'Der Das Konto darf nicht leer sein!',
                'receiptnumber.required' => 'Die Belegnummer darf nicht leer sein!',
                'receiptnumber.string'      => 'Die Belegnummer muss eine Zeichenkette sein!',
                'receiptnumber.unique' => 'Die Belegnummer ist schon vergeben!',
                'receiptnumber.max'      => 'Die Belegnummer darf nur 10 Zeichen enthalten!',
                'receiptnumber.regex'      => 'Die Belegnummer muss folgendes Format haben: 2018-001!',
                'member_id.required' => 'Das Mitglied darf nicht leer sein!',
                'type.required' => 'Das Mitglied darf nicht leer sein!',
            ]
        );

        $transaction = new FinanceTransaction();
        $transaction->invoicedate = date("Y-m-d",strtotime(str_replace('.','-',$request->invoicedate)));
        $transaction->paydate = date("Y-m-d",strtotime(str_replace('.','-',$request->paydate)));
        $transaction->purpose = $request->purpose;
        $transaction->finance_account_id = $request->finance_account_id;
        $transaction->amount = $request->amount;
        $transaction->finance_category_id = $request->finance_category_id;
        $transaction->receiptnumber = $request->receiptnumber;
        $transaction->member_id = $request->member_id;
        $transaction->type = $request->type;

        $transaction->save();

        // Tags speichern: Erst nachm Speichern der Transaktion. Die muss ja erst in der DB sein bevor man zu der ne Verknüpfung machen kann
        // sync mit false: setup new relations without detaching previous AND without adding duplicates:
        $transaction->tags()->sync($request->get('tag_id'), false);

        Session::flash('success', 'Transaktion angelegt.');

        return redirect()->route('finance.transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = FinanceTransaction::find($id);

        $categories = FinanceCategory::pluck('name', 'id');
        $accounts = FinanceAccount::pluck('name', 'id');
        $members = Member::pluck('lastname', 'id');
        $tags = FinanceTag::pluck('name', 'id');
        return view('finance.transactions.edit')
            ->with('transaction', $transaction)
            ->with('categories', $categories)
            ->with('accounts', $accounts)
            ->with('members', $members)
            ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = FinanceTransaction::find($id);
        $this->validate($request,
            [
                'invoicedate' => 'bail|required|date|before_or_equal:paydate',
                'paydate' => 'bail|date|required',
                'purpose' => 'bail|required|string|max:191',
                'finance_account_id' => 'bail|required',
                'amount' => 'bail|required|regex:/^\d*(\.\d{1,2})?$/', /*Nur Geldwerte vom Typ zb 123.45*/
                'finance_category_id' => 'bail|required',
                'receiptnumber' => 'bail|required|string|max:10|unique:finance_transactions,receiptnumber,'. $transaction->id .'|regex:/^20\d{2}\-\d{3}$/', /*Nur Belegnummern im Format zb 2018-001*/
                'member_id' => 'bail|required',
                'type' => ['bail', 'required', Rule::in(['Ausgabe', 'Einnahme'])],
                "tag_id" => 'array',
            ],
            [
                'invoicedate.required' => 'Das Rechungsdatum darf nicht leer sein!',
                'invoicedate.date'      => 'Das Rechungsdatum muss ein Datum sein!',
                'invoicedate.max'      => 'Das Rechungsdatum darf höchstens 191 Zeichen enthalten!',
                'invoicedate.before_or_equal' => 'Das Rechungsdatum darf nicht später als das Bezahldatum sein!',
                'paydate.required' => 'Das Bezahldatum darf nicht leer sein!',
                'paydate.date'      => 'Das Bezahldatum muss ein Datum sein!',
                'purpose.required' => 'Der Zweck darf nicht leer sein!',
                'purpose.max'      => 'Der Zweck darf höchstens 191 Zeichen enthalten!',
                'purpose.string'      => 'Der Zweck muss eine Zeichenkette sein!',
                'finance_account_id.required' => 'Der Das Konto darf nicht leer sein!',
                'amount.required' => 'Der Betrag darf nicht leer sein!',
                'amount.regex' => 'Der Betrag muss ein Geldbetrag sein! Trennzeichen ist der Punkt.',
                'finance_category_id.required' => 'Der Das Konto darf nicht leer sein!',
                'receiptnumber.required' => 'Die Belegnummer darf nicht leer sein!',
                'receiptnumber.string'      => 'Die Belegnummer muss eine Zeichenkette sein!',
                'receiptnumber.unique' => 'Die Belegnummer ist schon vergeben!',
                'receiptnumber.max'      => 'Die Belegnummer darf nur 10 Zeichen enthalten!',
                'receiptnumber.regex'      => 'Die Belegnummer muss folgendes Format haben: 2018-001!',
                'member_id.required' => 'Das Mitglied darf nicht leer sein!',
                'type.required' => 'Das Mitglied darf nicht leer sein!',
            ]
        );

        $transaction->invoicedate = date("Y-m-d",strtotime(str_replace('.','-',$request->invoicedate)));
        $transaction->paydate = date("Y-m-d",strtotime(str_replace('.','-',$request->paydate)));
        $transaction->purpose = $request->purpose;
        $transaction->finance_account_id = $request->finance_account_id;
        $transaction->amount = $request->amount;
        $transaction->finance_category_id = $request->finance_category_id;
        $transaction->receiptnumber = $request->receiptnumber;
        $transaction->member_id = $request->member_id;
        $transaction->type = $request->type;

        $transaction->save();

        // Tags speichern: Erst nachm Speichern der Transaktion. Die muss ja erst in der DB sein bevor man zu der ne Verknüpfung machen kann
        // sync mit false: setup new relations without detaching previous AND without adding duplicates:
        // Beim Update: Alle in Transaktion gespeicherten detached machen (löschen) und dann die aus dem Update einfügen. Geht bestimmt schöner
        $transaction->tags()->detach($transaction->tags);
        $transaction->tags()->sync($request->get('tag_id'), false);

        Session::flash('success', 'Änderungen gespeichert.');

        return redirect()->route('finance.transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = FinanceTransaction::find($id);
        $transaction->delete();
        Session::flash('success', 'Transaktion gelöscht.');
        return redirect()->route('finance.transactions.index');
    }
}
