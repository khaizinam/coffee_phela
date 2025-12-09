<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_entity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_id');
            $table->string('entity_type'); // App\Models\Product, App\Models\Category, etc.
            $table->unsignedBigInteger('entity_id');
            $table->string('collection')->nullable()->comment('Thumbnail, gallery, banner, etc.');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            // Foreign key - will be added after galleries table exists
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            
            // Indexes
            $table->index(['entity_type', 'entity_id']);
            $table->index('collection');
            $table->unique(['gallery_id', 'entity_type', 'entity_id', 'collection'], 'gallery_entity_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_entity');
    }
}
