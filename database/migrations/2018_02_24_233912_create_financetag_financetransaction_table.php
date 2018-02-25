<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancetagFinancetransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financetag_financetransaction', function (Blueprint $table) {
            $table->integer('finance_tag_id')->unsigned()->nullable(); // Konto
            $table->foreign('finance_tag_id')->references('id')->on('finance_tags')->onUpdate('cascade')->onDelete('set null');

            $table->integer('finance_transaction_id')->unsigned()->nullable(); // Konto
            $table->foreign('finance_transaction_id')->references('id')->on('finance_transactions')->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financetag_financetransaction');
    }
}
