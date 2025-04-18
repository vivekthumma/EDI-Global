<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_cources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cource_id');
            $table->string('sub_cource_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('brochure')->nullable();
            $table->string('icon')->nullable();
            $table->string('eligibility')->nullable();
            $table->longText('short_content')->nullable();
            $table->longText('syllabus')->nullable();
            $table->longText('about')->nullable();
            $table->longText('admission_process')->nullable();
            $table->longText('carrier_scope')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_cources');
    }
}
