<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->text('ar_description');
            $table->text('en_description');
            $table->text('ar_terms')->nullable();
            $table->text('en_terms')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price',8,4)->nullable();
            $table->string('photos')->nullable();
            $table->string('videos')->nullable();
            $table->boolean('is_active')->default(1);

            $table->boolean('is_offer')->default(0);
            $table->decimal('discount')->default(0);
            $table->decimal('price_after_discount')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('services');
    }
}
