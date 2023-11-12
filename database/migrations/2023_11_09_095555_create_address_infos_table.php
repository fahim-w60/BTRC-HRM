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
        Schema::create('address_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedInteger('user_id');
            $table->text('present_address_english');
            $table->text('present_address_bangla')->nullable();
            $table->text('permanent_address_english');
            $table->text('permanent_address_bangla')->nullable();
            $table->unsignedInteger('nid');
            $table->unsignedInteger('mobile');
            $table->string('email')->nullable();
            $table->boolean('status')->default(1)->comment(['0=>Inactive', '1=>Active']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_infos');
    }
};
