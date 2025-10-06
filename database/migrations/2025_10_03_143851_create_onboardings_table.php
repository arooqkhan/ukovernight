<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('onboardings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // login user relation
            $table->string('first_name');
            $table->string('surname');
            $table->string('maiden_name')->nullable();
            $table->string('previous_name')->nullable();
            $table->string('telephone_number');
            $table->string('mobile_number');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->boolean('is_driver');
            $table->string('post_code');
            $table->string('ni_number');
            $table->string('email');
            $table->boolean('own_transport');
            $table->boolean('endorsements');
            $table->text('address');
            $table->string('position_applied');
            $table->string('location');
            $table->enum('work_preference', ['Full Time', 'Part Time']);
            $table->string('hours_requested');

            // Character Reference
            $table->string('referee_name');
            $table->text('referee_address');
            $table->string('referee_tel');
            $table->string('referee_email');
            $table->string('candidate_name');
            $table->string('position_for');
            $table->string('capacity_known');
            $table->string('known_duration');
            $table->text('referee_views');
            $table->string('referee_signature');
            $table->date('referee_date');

            // Employee Reference
            $table->string('company_name');
            $table->text('company_address');
            $table->string('company_tel');
            $table->string('company_email');
            $table->date('employment_start_date');
            $table->date('employment_end_date');
            $table->text('position_duties');
            $table->string('capacity_employee_known');
            $table->string('reason_for_leaving');
            $table->boolean('performance_issues');
            $table->boolean('would_reemploy');

            // Bank Details
            $table->string('bank_name');
            $table->text('bank_address');
            $table->string('sort_code');
            $table->string('account_number');
            $table->string('account_name');

            // Equal Opportunity
            $table->string('ethnic_origin');
            $table->string('gender_eo');
            $table->string('sexual_orientation');
            $table->string('religion');
            $table->string('marital_status');
            $table->boolean('has_disability');
            $table->string('caring_responsibilities');

            // Driver & Vehicle
            $table->string('driving_licence');
            $table->string('vehicle_insurance');
            $table->string('tax_mot');

            // Health Declaration
            $table->boolean('health1');
            $table->boolean('health2');
            $table->boolean('health3');
            $table->boolean('health4');
            $table->boolean('health5');

            // DBS Declaration
            $table->string('dbs_signature');
            $table->string('dbs_print_name');
            $table->date('dbs_date');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboardings');
    }
};
