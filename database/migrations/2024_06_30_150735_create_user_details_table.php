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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //#### personal profile:
            $table->string('profile_type')->nullable();
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('email')->nullable();
            $table->integer('bangla_boboborsho_allowance')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('interest_receivable_on_provident_fund')->nullable();
            $table->integer('allowable_exemption')->nullable();
            $table->boolean('disabilities')->default(false);
            $table->string('disability_details')->nullable();
            $table->boolean('freedom_fighter')->default(false);
            $table->string('freedom_fighter_details')->nullable();
            //contract profile
            $table->string('phone_no')->nullable();
            $table->string('mobile')->nullable();
            $table->text('present_address')->nullable();
            $table->string('present_city')->nullable();
            $table->string('present_post_code')->nullable();
            $table->string('present_country')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_post_code')->nullable();
            $table->string('permanent_country')->nullable();
            // etin profile
            $table->string('etin_number')->nullable();
            $table->integer('circle_id')->nullable();
            $table->integer('zone_id')->nullable();
            $table->string('tax_payer_status')->nullable();
            $table->string('residential_status')->nullable();
            $table->integer('tax_payer_location_id')->nullable();
            $table->string('old_tin')->nullable();
            $table->integer('old_circle_id')->nullable();
            $table->integer('old_zone_id')->nullable();
            // family profile
            $table->string('marital_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('etin_spouse')->nullable();
            $table->string('no_dependent_children')->nullable();
            $table->string('nid_spouse')->nullable();
            $table->boolean('children_disabled')->default(0)->comment('enabled=0,disabled=1');
            $table->string('children_disable_details')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('fathers_etin')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('mothers_etin')->nullable();
            // employee profile
            $table->string('profession')->nullable();
            $table->string('type_of_profession')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('name_of_employer')->nullable();
            $table->string('bin')->nullable();
            $table->string('etin_business')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_city')->nullable();
            $table->string('office_post_code')->nullable();
            $table->string('office_country')->nullable();
            $table->timestamps();

            //#### practitioners profile
            $table->string('type_of_practitioner')->nullable();
            $table->string('license_no')->nullable();
            $table->string('trade_license_no')->nullable();
            //authorization
            $table->string('authorization_name')->nullable();
            $table->string('authorization_designation')->nullable();
            $table->string('authorization_phone_no')->nullable();
            $table->string('authorization_email')->nullable();
            $table->string('authorization_authority')->nullable();
            $table->string('authorization_file')->nullable();
            //service plan
            $table->integer('no_of_employee')->nullable();
            $table->integer('discount_coupon')->nullable();

            // #### Corporate Profile
            //company profile
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('type_of_business')->nullable();
            $table->string('incorporation_no')->nullable();
            //authorization
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
