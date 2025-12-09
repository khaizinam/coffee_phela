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
            $table->enum('position', ['header', 'body_start', 'body_end'])->unique()->comment('Vị trí chèn script (chỉ có 3 vị trí: header, body_start, body_end)');
            $table->text('code')->nullable()->comment('Mã JavaScript/HTML');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
