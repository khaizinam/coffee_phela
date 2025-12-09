<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên trang (ví dụ: "Trang chủ", "Giới thiệu")
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable(); // meta_content
            $table->string('meta_image')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('banner_image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('pages');
    }
}
