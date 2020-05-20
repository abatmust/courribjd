<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('saf_num')->nullable()->default(null);
            $table->date('saf_date')->nullable()->default(null);
            $table->mediumInteger('bjd_num')->nullable()->default(null);
            $table->date('bjd_date')->nullable()->default(null);
            $table->string('sender');
            $table->string('saf_note')->nullable()->default(null);
            $table->text('subject');
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
        Schema::dropIfExists('mails');
    }
}
