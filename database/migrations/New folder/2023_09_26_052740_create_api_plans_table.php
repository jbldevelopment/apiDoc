<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_plans', function (Blueprint $table) {
            $table->id('api_plan_id');
            $table->integer('api_id')->comment("FK-ApiList");
            $table->text('api_plan_title');
            $table->text('api_plan_descripetion');
            $table->text('api_plan_regular_price')->comment("it will show as Original price");
            $table->text('api_plan_discounted_price')->comment("it will show as Dicounted price");
            $table->text('api_discounted_off_text')->nullable()->comment("show to usre that discounted offer name");
            $table->integer('api_monthly_duration')->nullable()->comment("it will show as how many month this package provides");
            $table->integer('api_plane_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('api_plans');
    }
};
