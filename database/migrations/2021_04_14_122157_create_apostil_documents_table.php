<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApostilDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apostil_documents', function (Blueprint $table) {
            $table->id();
            $table->string('apostil_number');
            $table->date('apostil_date')->nullable();
            $table->integer('apostil_signing_user_id')->nullable();
            $table->integer('mail_status')->default(0);
            $table->integer('rs_number')->nullable();
            $table->date('rs_date')->nullable();
            $table->string('rs_signing_user',50)->nullable();
            $table->string('rs_signing_user_en',50)->nullable();
            $table->string('rs_signing_position',200)->nullable();
            $table->string('rs_signing_position_en',200)->nullable();
            $table->string('rs_service',200)->nullable();
            $table->string('rs_service_en',200)->nullable();
            $table->string('rs_document_name',50)->nullable();
            $table->string('rs_document_name_en',50)->nullable();
            $table->string('rs_short_note',500)->nullable();
            $table->integer('status')->default(0);


            $table->unsignedBigInteger('apostil_user_id')->nullable();

            $table->integer('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apostil_documents');
    }
}
