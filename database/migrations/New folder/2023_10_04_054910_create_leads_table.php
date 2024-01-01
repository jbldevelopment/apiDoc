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
        Schema::create('leads', function (Blueprint $table) {
            $table->id('lead_id');
            $table->integer('lead_user_id')->comment("FK-Users | 0 = newLead + newUser | 0 <  newLead + registreredUser");
            $table->text('lead_name');
            $table->text('lead_email');
            $table->text('lead_mobile');
            $table->text('lead_occupation');
            $table->text('lead_otp');
            $table->integer('lead_verified')->default(0)->comment("0 - NotVerified | 1 - Verified");
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
        Schema::dropIfExists('leads');
    }
};
