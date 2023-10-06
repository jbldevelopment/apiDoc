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
        Schema::create('lead_metas', function (Blueprint $table) {
            $table->id('lead_meta_id');
            $table->integer('lead_id')->comment("FK-Leads | 0 = newLead + newUser | 0 <  newLead + registreredUser");
            $table->text('lead_intrest')->comment("FK - API | API CATEGORY ");
            $table->integer('lead_attchment')->default(0)->comment("0 = Not Downloaded | 0 < Downloaded");
            $table->integer('lead_status')->default(0)->comment("0 - Pending | 1 - Active | 2 - Complete | 3 - Cancel | 4 - Deleted");
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
        Schema::dropIfExists('lead_metas');
    }
};
