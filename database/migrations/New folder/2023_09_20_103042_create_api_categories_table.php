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
        Schema::create('api_categories', function (Blueprint $table) {
            $table->id('api_category_id');
            $table->text('api_category_title');
            $table->text('api_category_short_desc')->nullable();
            $table->text('api_category_slug');
            $table->text('api_category_icon')->nullable();
            $table->longText('api_category_descripetion');
            $table->integer('api_category_order')->default(0)->comment("Sequence to Render Api in page Order Vise");
            $table->integer('api_category_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('api_categories');
    }
};
