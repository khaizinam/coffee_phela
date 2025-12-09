<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomJavascriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_javascripts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Tên script (để dễ quản lý)');
            $table->enum('position', ['header', 'body_start', 'body_end'])->comment('Vị trí chèn script');
            $table->text('code')->comment('Mã JavaScript/HTML');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0)->comment('Thứ tự sắp xếp');
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
        Schema::dropIfExists('custom_javascripts');
    }
}
