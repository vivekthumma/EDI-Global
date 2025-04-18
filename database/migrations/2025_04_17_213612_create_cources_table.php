<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('program_id');
            $table->string('cource_name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('duration')->nullable();
            $table->string('fees')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('image')->nullable();
            $table->string('brochure')->nullable();
            $table->string('icon')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('short_content')->nullable();
            $table->longText('about')->nullable();
            $table->longText('key_highlights')->nullable();
            $table->longText('subject_syllabus')->nullable();
            $table->longText('eligibility_duration')->nullable();
            $table->longText('program_fee')->nullable();
            $table->longText('admission_process')->nullable();
            $table->longText('course_specialization')->nullable();
            $table->longText('education_loan')->nullable();
            $table->longText('worth_it')->nullable();
            $table->longText('carrier_scope')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cources');
    }
}
