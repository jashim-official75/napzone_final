<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained('plans');
            $table->foreignId('subscriber_id')->constrained('subscribers');
            $table->string('service_type')->comment('D for daily W for weekly B for biweekly M for monthly O for on demand');
            $table->integer('autorenew')->default(1);
            $table->integer('renewed')->default(0);
            $table->integer('confirmed_by_user')->default(0);
            $table->integer('purchase_confirmed')->default(0);
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->string('refid');
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
        Schema::dropIfExists('purchase_plans');
    }
}
