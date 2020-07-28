<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('CustomerID')->unsigned();
            $table->string('ContractAddress');
            $table->decimal('ContractAmount',5,2);
            $table->decimal('ContractSign',5,2);
            $table->integer('ContractQtPayment');
            $table->string('ContractFile')->nullable();
            $table->enum('ContractStatus',['aberto', 'fechado']);
            $table->foreign('CustomerID')->references('id')->on('customers');
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
        Schema::dropIfExists('contracts');
    }
}
