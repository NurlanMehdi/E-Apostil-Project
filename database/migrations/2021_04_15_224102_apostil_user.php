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
            $table->integer('apply_user_type')->nullable();
            $table->integer('apply_participant')->nullable();
            $table->string('doc_owner_name',50)->nullable();
            $table->string('doc_owner_lastname',50)->nullable();
            $table->string('doc_owner_fathername',50)->nullable();
            $table->integer('relationship_id')->nullable();
            $table->integer('power_of_attorney_number')->nullable();
            $table->string('letter_number')->nullable();
            $table->date('issue_date')->nullable();
            $table->string('legal_user_name',100)->nullable();
            $table->string('voen',50)->nullable();
            $table->string('position')->nullable();
            $table->string('name_of_state_body')->nullable();
            $table->integer('doc_type_id')->nullable();
            $table->string('shv_series',4)->nullable();
            $table->integer('shv_number')->length(8)->nullable();
            $table->string('letter_name')->nullable();
            $table->date('doc_presented_date')->nullable();
            $table->string('doc_presented_name')->nullable();
            $table->string('doc_presented_lastname')->nullable();
            $table->string('doc_presented_fathername')->nullable();
            $table->date('doc_presented_birtday_date')->nullable();
            $table->string('doc_presented_reg_address')->nullable();
            $table->string('doc_presented_native')->nullable();
            $table->string('doc_presented_tel',12)->nullable();
            $table->string('doc_presented_mail')->nullable();
            $table->integer('gender')->nullable();
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
