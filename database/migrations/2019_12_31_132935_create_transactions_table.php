<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PaymentGateway');
            $table->string('ReferenceId');
            $table->string('TrackId');
            $table->string('InvoiceStatus');
            $table->string('PaymentId');
            $table->string('AuthorizationId');
            $table->string('TransactionStatus');
            $table->string('TransationValue');
            $table->string('CustomerName');
            $table->string('CustomerMobile');
            $table->string('PaidCurrency');
            $table->string('TransactionId');
            $table->string('CustomerEmail');
            $table->string('InvoiceId');
            $table->string('InvoiceReference');
            $table->string('InvoiceDisplayValue');

            $table->string('Error')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
