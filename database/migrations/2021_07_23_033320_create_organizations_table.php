<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('head_fio', 100);
            $table->string('name', 100);
            $table->string('address', 300);
            $table->string('email', 100);
            $table->string('phone', 50);
            $table->string('bank_name', 100);
            $table->string('bin', 12);
            $table->string('bik', 100);
            $table->string('iik', 20);
            $table->string('otv_fio', 100);
            $table->string('otv_phone', 100);
            $table->string('otv_email', 100);
            $table->string('mail_index', 50);
            $table->string('domain_name', 100);
            $table->string('license_file', 100);
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
        Schema::dropIfExists('organizations');
    }
}
