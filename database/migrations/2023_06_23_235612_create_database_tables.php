<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        }); 
        
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 100);
            $table->string('category_description', 100);
            $table->timestamps();
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 100);
            $table->string('product_description', 100);
            $table->integer('product_weight');
            $table->string('measurement_units', 10);
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('supermarket_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('list_name', 100);
            $table->decimal('supermarket_list_price_total', 5, 2);
            $table->timestamps();
        });

        Schema::create('supermarket_lists_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('supermarket_list_id');
            $table->string('purchased', 1);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('supermarket_list_id')->references('id')->on('supermarket_lists')->onDelete('cascade');
            $table->integer('product_quantity');
            $table->decimal('supermarket_list_products_price', 5, 2);
            $table->timestamps();
        });       
        
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price_value', 5, 2);
            $table->date('quotation_date');
            $table->timestamps();
        });
        
        Schema::create('product_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('price_id');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name', 100);
            $table->timestamps();
        });
        
        Schema::create('product_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_street', 100);
            $table->integer('address_number');
            $table->string('address_district', 100);
            $table->string('address_city', 100);
            $table->string('address_state', 100);
            $table->string('address_zipcode', 9);
            $table->timestamps();
        });
        
        Schema::create('georeferencing_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('x_coordinate', 50);
            $table->string('y_coordinate', 50);
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('emporiums', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('georeferencing_address_id');
            $table->foreign('georeferencing_address_id')->references('id')->on('georeferencing_addresses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('emporiums_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emporium_id');
            $table->foreign('emporium_id')->references('id')->on('emporiums')->onDelete('cascade');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('larders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provider', 100)->nullable();
            $table->string('provider_id', 100)->nullable();
            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password', 100)->nullable();
            $table->timestamps();
        });
        
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipe_name', 100);
            $table->string('recipe_description', 100);
            $table->integer('preparation_time');
            $table->text('instructions');
            $table->timestamps();
        });
        
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name', 100);
            $table->date('event_date');
            $table->timestamps();
        });
        
        Schema::create('event_recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('shared_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('shared_with_user_id');
            $table->foreign('shared_with_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('larders_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('larder_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->date('expiration_date');                     
            $table->foreign('larder_id')->references('id')->on('larders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('supermarket_lists');
        Schema::dropIfExists('supermarket_lists_products');
        Schema::dropIfExists('prices');
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('product_brands');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('georeferencing_addresses');
        Schema::dropIfExists('emporiums');
        Schema::dropIfExists('emporiums_products');
        Schema::dropIfExists('larders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_recipe');
        Schema::dropIfExists('shared_lists');
        Schema::dropIfExists('larders_products');
    }
}
