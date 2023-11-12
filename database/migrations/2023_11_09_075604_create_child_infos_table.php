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
        Schema::create('child_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('child_name');
            $table->string('childDateOfBirth');
            $table->text('child_institute_name')->nullable();
            $table->boolean('educational_status')->default(0)->comment(['0=>Inactive', '1=>Active']);
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
        Schema::dropIfExists('child_infos');
    }
};