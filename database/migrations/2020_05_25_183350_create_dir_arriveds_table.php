<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirArrivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dir_arriveds', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('num_dir')->nullable()->default(null);
            $table->date('date_dir')->nullable()->default(null);
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
        Schema::dropIfExists('dir_arriveds');
    }
}
