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
        Schema::create('office_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('designation_id');
            $table->text('date_of_join');
            $table->text('commission_date')->nullable();
            $table->text('promotion_date')->nullable();
            $table->string('telephone_office')->nullable();
            $table->string('telephone_home')->nullable();
            $table->string('pbx')->nullable();
            $table->double('salary');
            $table->boolean('status')->default(1)->comment('0=>Inactive', '1=>Active');
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
        Schema::dropIfExists('office_infos');
    }
};