<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     * one member/category to many transactions: https://www.easylaravelbook.com/blog/creating-a-hasmany-relation-in-laravel-5/
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoicedate')->nullable(); // Rechungsdatum
            $table->date('paydate'); // Bezahldatum
            $table->string('purpose'); // Zweck
//            $table->string('purpose'); // Tag
            $table->integer('finance_account_id')->unsigned(); // Konto
            $table->foreign('finance_account_id')->references('id')->on('finance_accounts')->onDelete('cascade'); // Fremdschlüssel für Konto
            $table->decimal('amount'); // Betrag
            $table->integer('finance_category_id')->unsigned(); // Kategorie
            $table->foreign('finance_category_id')->references('id')->on('finance_categories')->onDelete('cascade'); // Fremdschlüssel für Kategorie
            $table->string('receiptnumber')->unique(); // Belegnummer
            $table->integer('member_id')->unsigned(); // Person
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade'); // Fremdschlüssel für Mitglied
            $table->timestamps();
        });
    }

//* Rechungsdatum x
//* Bezahldatum x
//* Zweck x
//* Tag
//* Betrag
//* Kategorie
//* Belegnummer?
//* Beleg?
//* Person?

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finance_transactions');
    }
}
