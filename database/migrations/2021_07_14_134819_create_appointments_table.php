<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
           // $table->enum('day',['saturday','sunday','monday','tuesday','wednesday','thursday','friday']);
            $table->date('day')->default(now());
            $table->time('from');
            $table->time('to');
            $table->enum('day_status',['work','holiday']);
            $table->foreignIdFor(\App\Models\Service::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('appointments');
    }
}
