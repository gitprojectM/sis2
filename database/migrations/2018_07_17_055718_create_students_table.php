<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('lrn',15);
            $table->string('fname',50);
            $table->string('lname',50);
            $table->string('mname',50);
            $table->string('sex',6);
            $table->date('birth_date');
            $table->string('age',2);
            $table->string('etnic_group',50);
            $table->string('religion',50);
            $table->string('street',50);
            $table->string('barangay',50);
            $table->string('municipality',50);
            $table->string('province',50);
            $table->string('father_fname',50);
            $table->string('father_lname',50);
            $table->string('father_mname',50);
            $table->string('mother_fname',50);
            $table->string('mother_lname',50);
            $table->string('mother_mname',50);
            $table->string('Gname',50);
            $table->string('relationship',50);
            $table->string('pcontact',50);
            $table->string('remark',50);
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
        Schema::dropIfExists('students');
    }
}
