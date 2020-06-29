<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToukousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toukous', function (Blueprint $table) {
            $table->bigIncrements('toukou_id');
            $table->string('toukou_title');
            $table->string('toukou_image')->nullable();
            $table->string('toukou_honbun');
            $table->integer('thread_id');
            $table->string('author_id');
            $table->string('changer_id');
            $table->date('creation_date');
            $table->date('update_date');
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
        Schema::dropIfExists('toukous');
    }
}
