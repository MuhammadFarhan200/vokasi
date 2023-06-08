<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->longText('prodi')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('name');
            $table->longText('code');
            $table->integer('sks');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('tested_components', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        DB::table('tested_components')->insert([
            ['name' => 'Proposal', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TA 1', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prasidang', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sidang', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'NN', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        Schema::create('tester_positions', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        DB::table('tester_positions')->insert([
            ['name' => 'Ketua', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anggota Penguji', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        Schema::create('teachings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('subject_id')->default(0);
            $table->longText('sks')->nullable();
            $table->integer('meeting')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('final_project_advisors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('subject_id')->default(0);
            $table->longText('group_title')->nullable();
            $table->longText('group_total')->nullable();
            $table->integer('tested_component_id')->default(0);
            $table->longText('meeting_expectations')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('final_project_testers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('subject_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->integer('tested_component_id')->nullable();
            $table->integer('tester_position_id')->nullable();
            $table->longText('group_title')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('college_leadership_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('position_name')->nullable();
            $table->longText('expectation_time')->nullable();;
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('supervise_lower_ranking_lecturers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('name')->nullable();
            $table->longText('activity_name')->nullable();
            $table->longText('supervised_lecturer')->nullable();;
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('student_assistances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('guide_seminars', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('total_group')->nullable();
            $table->longText('meeting_expectations')->nullable();
            $table->longText('group_title')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('work_practices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('meeting_expectations')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('mentoring_final_study_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('meeting_expectations')->nullable();
            $table->longText('group_title')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('served_as_an_examiner', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->integer('tester_position_id')->nullable();
            $table->longText('group_title')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();;
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('delivering_scientific_orations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('sks')->nullable();;
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();;
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();;
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('scientific_works', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('processing')->nullable();
            $table->longText('involved_figure')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('research_results', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('processing')->nullable();
            $table->longText('involved_figure')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('editing_scientific_papers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('processing')->nullable();
            $table->longText('involved_figure')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('intellectual_property_registry', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('activity_name')->nullable();
            $table->longText('processing')->nullable();
            $table->longText('involved_figure')->nullable();
            $table->integer('sks')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('result_developments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->longText('name')->nullable();
            $table->longText('location')->nullable();
            $table->longText('assignment_proof')->nullable();
            $table->longText('year')->nullable();
            $table->longText('semester')->nullable();
            $table->longText('status')->nullable();
            $table->longText('agreement')->nullable();
            $table->longText('proof')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('teachings');
        Schema::dropIfExists('final_project_advisors');
        Schema::dropIfExists('final_project_testers');
        Schema::dropIfExists('scientific_works');
        Schema::dropIfExists('research_results');
        Schema::dropIfExists('result_developments');
        Schema::dropIfExists('tested_components');
        Schema::dropIfExists('tester_positions');
        Schema::dropIfExists('college_leadership_positions');
        Schema::dropIfExists('supervise_lower_ranking_lecturers');
        Schema::dropIfExists('student_assistances');
        Schema::dropIfExists('guide_seminars');
        Schema::dropIfExists('served_as_an_examiner');
        Schema::dropIfExists('delivering_scientific_orations');
        Schema::dropIfExists('editing_scientific_papers');
        Schema::dropIfExists('intellectual_property_registry');
    }
};
