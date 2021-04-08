<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->Integer('vendor_id')->nullable();
  
            $table->Integer('author_id')->nullable();
  
            $table->Integer('sub_category_id')->nullable();
  
            $table->Integer('publisher_id')->nullable();
  
            $table->Integer('language_id')->nullable();
  
            $table->string('name',50)->nullable();
  
            $table->string('title',100)->nullable();
  
            $table->string('isbn',20)->nullable();
  
            $table->text('description')->nullable();
  
            $table->date('published_date')->nullable();
  
            $table->string('image')->nullable();
  
            $table->integer('discount',10)->nullable();
            $table->double('price')->nullable();
  
            $table->string('demo_file')->nullable();
            $table->string('attachment')->nullable();
  
            $table->integer('min_stock')->nullable();
  
            $table->integer('max_stock')->nullable();
  
            $table->integer('demo_pages')->nullable();
  
            //$table->enum('status',array('pending','published','declined'))->nullable();
            //$table->double('discounted_price')->virtualAs('(round(`price` - `discount` / 100 * `price`,2))');
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
        Schema::dropIfExists('books');
            $table->enum('status',array('pending','published','declined'))->nullable();
            $table->double('discounted_price')->virtualAs('(round(`price` - `discount` / 100 * `price`,2))');
    }
}
