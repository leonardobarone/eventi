<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title_it', 100);
            $table->string('title_en', 100)->nullable();
            $table->text('description_it')->nullable();
            $table->text('description_en')->nullable();
            $table->string('place', 100);
            $table->dateTime('date', 0);
            $table->string('phone_1', 50)->nullable();
            $table->string('phone_2', 50)->nullable();
            $table->string('whatsapp_1', 50)->nullable();
            $table->string('whatsapp_2', 50)->nullable();
            $table->string('site')->nullable();
            $table->string('organizer', 100)->nullable();
            $table->string('playbill')->nullable();
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
        Schema::dropIfExists('events');
    }
}
