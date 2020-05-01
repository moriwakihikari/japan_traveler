<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToukousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toukous', function (Blueprint $table)
        {
            $table->dropColumn(['creation_date', 'update_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('toukous', function (Blueprint $table)
        {
            $table->boolean(['creation_date', 'update_date'])->default(false);
        });
    }
}
