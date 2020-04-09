<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->bigincrements('id');
            $table->string('toukou_id');
            $table->string('comment_honbun');
            $table->string('author_id');
            $table->string('changer_id');
            $table->date('creation_date');
            $table->date('update_date');
            $table->timestamps();
            /*$table->unsignedBigInteger('toukou_id');

            $table->foreign('toukou_id')->references('id')->on('toukous');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
