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
        Schema::create('api_code_metas', function (Blueprint $table) {
            $table->id('api_code_id');
            $table->integer('api_meta_id')->comment("FK-ApiMeta");
            $table->text('api_code_title');
            $table->text('api_code_slug')->comment("Use for division id in HTML");
            $table->longText('api_code');
            $table->integer('api_technology')->comment("FK-Technologies");
            $table->integer('api_code_order')->default(0)->comment("Sequence to Render Api in page Order Vise");
            $table->integer('api_code_status')->default(0)->comment("0 - Deactivate | 1 - Activate | 2 - Deleted");
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
        Schema::dropIfExists('api_code_metas');
    }
};
