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

            $table->integer('finance_account_id')->unsigned()->nullable(); // Konto
            $table->foreign('finance_account_id')->references('id')->on('finance_accounts')->onUpdate('cascade')->onDelete('set null'); // Fremdschlüssel für Konto

            $table->decimal('amount'); // Betrag

            $table->integer('finance_category_id')->unsigned()->nullable(); // Kategorie
            $table->foreign('finance_category_id')->references('id')->on('finance_categories')->onUpdate('cascade')->onDelete('set null'); // Fremdschlüssel für Kategorie

            $table->string('receiptnumber')->unique(); // Belegnummer

            $table->integer('member_id')->unsigned()->nullable(); // Mitglied
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('set null'); // Fremdschlüssel für Mitglied

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
