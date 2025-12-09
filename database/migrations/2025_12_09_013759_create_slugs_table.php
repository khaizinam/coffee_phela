<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slugs', function (Blueprint $table) {
            $table->id();
            $table->string('entity'); // Tên model/table: Product, Category, Post, etc.
            $table->unsignedBigInteger('entity_id'); // ID của record trong bảng đó
            $table->string('key'); // Slug string: 'san-pham-cafe'
            $table->string('prefix')->nullable(); // Prefix: '/san-pham/', '/danh-muc/', etc.
            $table->timestamps();
            
            // Index để tìm kiếm nhanh
            $table->index(['entity', 'entity_id']);
            $table->index('key');
            
            // Unique constraint để đảm bảo mỗi entity chỉ có một slug chính
            $table->unique(['entity', 'entity_id']);
            
            // Unique constraint để đảm bảo slug là duy nhất
            $table->unique(['key', 'prefix']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slugs');
    }
}
