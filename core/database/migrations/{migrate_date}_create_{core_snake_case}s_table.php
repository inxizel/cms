<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create{Core}sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('{core_snake_case}s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('{Core} name');
            $table->text('note')->nullable()->comment('Note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('{core_snake_case}s');
    }
}
