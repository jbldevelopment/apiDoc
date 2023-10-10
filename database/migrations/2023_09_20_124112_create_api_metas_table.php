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
        Schema::create('api_metas', function (Blueprint $table) {
            $table->id('api_meta_id');
            $table->integer('api_id')->comment("FK-ApiList");
            $table->text('api_meta_version');
            $table->text('api_meta_title');
            $table->text('api_meta_slug')->comment("Use for division id in HTML");
            $table->longText('api_meta_descripetion');
            $table->integer('api_meta_order')->default(0)->comment("Sequence to Render Api in page Order Vise");
            $table->text('api_meta_link')->nullable();
            $table->integer('api_meta_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('api_metas');
    }
};
