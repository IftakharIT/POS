<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProductsTable extends Migration
{
    public function up(){
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->unsignedBigInteger('category_id');
        $table->integer('quantity');
        $table->string('tag')->nullable();
        $table->string('vendor')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}


