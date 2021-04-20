<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApostilUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apostil_users', function (Blueprint $table) {
            $table->id();
            $table->integer('apply_user_type');
            $table->integer('apply_participant');
            $table->string('doc_owner_name',50)->nullable();
            $table->string('doc_owner_lastname',50)->nullable();
            $table->string('doc_owner_fathername',50)->nullable();
            $table->integer('relationship_id')->nullable();
            $table->integer('power_of_attorney_number')->nullable();
            $table->integer('letter_number')->nullable();
            $table->timestamp('issue_date')->nullable();
            $table->string('legal_user_name',20)->nullable();
            $table->string('voen',50)->nullable();
            $table->string('position')->nullable();
            $table->integer('doc_type_id');
            $table->string('shv_series',4);
            $table->integer('shv_number')->length(8);
            $table->string('letter_name');
            $table->timestamp('doc_presented_date')->nullable();
            $table->string('doc_presented_name');
            $table->string('doc_presented_lastname');
            $table->string('doc_presented_fathername');
            $table->timestamp('doc_presented_birtday_date')->nullable();
            $table->string('doc_presented_reg_address');
            $table->integer('doc_presented_native_id');
            $table->string('doc_presented_tel',12);
            $table->string('doc_presented_mail');
            $table->string('other_notes',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apostil_users');
    }
}
