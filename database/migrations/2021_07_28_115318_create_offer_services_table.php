<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Service::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('offer_services');
    }
}
