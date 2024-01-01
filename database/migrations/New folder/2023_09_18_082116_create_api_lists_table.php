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
        Schema::create('api_lists', function (Blueprint $table) {
            $table->id('api_id');
            $table->text('api_title');
            $table->text('api_slug');
            $table->longText('api_description');
            $table->integer('api_type')->default(1)->comment("0 - Free| 1 - Paid");
            $table->integer('api_order')->default(0)->comment("Sequence to Render Api in page Order Vise");
            $table->integer('api_category')->nullable();
            $table->text('api_link')->nullable();
            $table->integer('api_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('api_lists');
    }
};
