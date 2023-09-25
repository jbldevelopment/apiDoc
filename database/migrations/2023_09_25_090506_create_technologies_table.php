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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id('technolgy_id');
            $table->text('technolgy_name');
            $table->text('technolgy_slug')->comment("Use for division id in HTML");
            $table->integer('technolgy_order')->default(0)->comment("Sequence to Render Api in page Order Vise");
            $table->integer('technolgy_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('technologies');
    }
};
