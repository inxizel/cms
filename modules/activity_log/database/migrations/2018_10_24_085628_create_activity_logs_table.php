<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('log_name');
            $table->text('description')->comment('Link sử dụng');
            $table->integer('subject_id')->nullable();
            $table->string('subject_type')->nullable();
            $table->integer('causer_id')->nullable()->comment('ID người dùng');
            $table->string('causer_type')->nullable()->comment('Model người dùng');
            $table->string('ip_user')->nullable()->comment('Ip sử dụng');
            $table->string('methodType')->nullable()->comment('Kiểu method sử dụng');
            $table->string('userAgent')->nullable()->comment('Thông tin trình duyệt');
            $table->text('properties')->nullable()->comment('request dữ liệu');
            $table->timestamps();
            $table->softDeletes();

//            $table->index('log_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_log');
    }
}
