<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafArrivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saf_arriveds', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('num_saf')->nullable()->default(null);
            $table->date('date_saf')->nullable()->default(null);
            $table->string('observation')->nullable()->default(null);
            $table->foreignId('mail_id')
                  ->unique()
                  ->constrained()
                  ->onDelete('cascade');
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
        Schema::dropIfExists('saf_arriveds');
    }
}
