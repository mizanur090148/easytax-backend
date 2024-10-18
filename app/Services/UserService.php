<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Storage;


class UserService
{
    protected $user;
    protected $userDetails;

    public function __construct(User $user, UserDetails $userDetails)
    {
        $this->user = $user;
        $this->userDetails = $userDetails;
    }
    public function clientList($requestData){
        $clients = User::with('userDetail')->get();
        return $clients;
    }
    public function clientSave($requestData)
    {
        // Extract only fields that belong to the users table
        $userData = [
            'email' => $requestData['email'],
            'profile_type' => $requestData['profile_type'] ?? 'individual', // Default to 'individual' if not provided
            'password' => bcrypt('secret'), // Default password
            'email_verified_at' => $requestData['email_verified_at'] ?? null, // Optional field

        ];

        // Save user data to the users table
        $user = User::create($userData);

        // Extract fields that belong to the user_details table
        $userDetailData = [
            'mobile' => $requestData['mobile'] ?? null,
            'profession' => $requestData['profession'] ?? null,
            'etin_number' => $requestData['etin_number'] ?? null,
            'full_name' => $requestData['full_name'] ?? null,
            'email' => $requestData['email'] ?? null,
            'profile_type' => $requestData['profile_type'] ?? 'individual', // Default to 'individual' if not provided

        ];

        // Save additional user details using the userDetail() relationship
        $user->userDetail()->create($userDetailData);

        // Return the created user and associated details
        return $user->load('userDetail'); // This loads the user along with the related user details
    }

    public function update($requestData, $id)
    {
        $user = $this->user->find($id);

        if (!$user) {
            throw new \Exception("User not found");
        }

        $userDetails = $this->userDetails->where('user_id', $id)->first();

        if (!$userDetails) {
            $data = $this->prepareData($requestData);
            $data['user_id'] = $id;
            $userDetails = $this->userDetails->create($data);
        } else {
            $data = $this->prepareData($requestData, $userDetails);
            $userDetails->update($data);
        }

        return $userDetails;
    }


    protected function prepareData($requestData, $existingData = null)
    {
        if (!$existingData) {
            return $requestData;
        }
        $old_tin="";
        $old_circle_id="";
        $old_zone_id="";

        if(!empty($requestData['has_old_tin'])){
            $old_tin= $requestData['old_tin'] ?? "";
            $old_circle_id = $requestData['old_circle_id'] ?? "";
            $old_zone_id = $requestData['old_zone_id'] ?? "";

        }

        $data = [
            //#### personal profile:
            'profile_type' => $requestData['profile_type'] ?? $existingData->profile_type,
            'full_name' => $requestData['full_name'] ?? $existingData->full_name,
            'gender' => $requestData['gender'] ?? $existingData->gender,
            'dob' => $requestData['dob'] ?? $existingData->dob,
            'nid' => $requestData['nid'] ?? $existingData->nid,
            'passport_no' => $requestData['passport_no'] ?? $existingData->passport_no,
            'email' => $requestData['email'] ?? $existingData->email,
            'bangla_boboborsho_allowance' => $requestData['bangla_boboborsho_allowance'] ?? $existingData->bangla_boboborsho_allowance,
            'interest_receivable_on_provident_fund' => $requestData['interest_receivable_on_provident_fund'] ?? $existingData->interest_receivable_on_provident_fund,
            'allowable_exemption' => $requestData['allowable_exemption'] ?? $existingData->allowable_exemption,
            'disabilities' => $requestData['disabilities'] ?? $existingData->disabilities,
            'disability_details' => $requestData['disability_details'] ?? $existingData->disability_details,
            'freedom_fighter' => $requestData['freedom_fighter'] ?? $existingData->freedom_fighter,
            'freedom_fighter_details' => $requestData['freedom_fighter_details'] ?? $existingData->freedom_fighter_details,
            //contract profile
            'phone_no' => $requestData['phone_no'] ?? $existingData->phone_no,
            'mobile' => $requestData['mobile'] ?? $existingData->mobile,
            'present_address' => $requestData['present_address'] ?? $existingData->present_address,
            'present_city' => $requestData['present_city'] ?? $existingData->present_city,
            'present_post_code' => $requestData['present_post_code'] ?? $existingData->present_post_code,
            'present_country' => $requestData['present_country'] ?? $existingData->present_country,
            'permanent_address' => $requestData['permanent_address'] ?? $existingData->permanent_address,
            'permanent_city' => $requestData['permanent_city'] ?? $existingData->permanent_city,
            'permanent_post_code' => $requestData['permanent_post_code'] ?? $existingData->permanent_post_code,
            'permanent_country' => $requestData['permanent_country'] ?? $existingData->permanent_country,
            // etin profile
            'etin_number' => $requestData['etin_number'] ?? $existingData->etin_number,
            'circle_id' => $requestData['circle_id'] ?? $existingData->circle_id,
            'zone_id' => $requestData['zone_id'] ?? $existingData->zone_id,
            'tax_payer_status' => $requestData['tax_payer_status'] ?? $existingData->tax_payer_status,
            'residential_status' => $requestData['residential_status'] ?? $existingData->residential_status,
            'tax_payer_location_id' => $requestData['tax_payer_location_id'] ?? $existingData->tax_payer_location_id,
            'old_tin' =>$old_tin,
            'old_circle_id' => $old_circle_id,
            'old_zone_id' => $old_zone_id,
            // family profile
            'marital_status' => $requestData['marital_status'] ?? $existingData->marital_status,
            'spouse_name' => $requestData['spouse_name'] ?? $existingData->spouse_name,
            'etin_spouse' => $requestData['etin_spouse'] ?? $existingData->etin_spouse,
            'no_dependent_children' => $requestData['no_dependent_children'] ?? $existingData->no_dependent_children,
            'nid_spouse' => $requestData['nid_spouse'] ?? $existingData->nid_spouse,
            'children_disabled' => $requestData['children_disabled'] ?? $existingData->children_disabled,
            'children_disable_details' => $requestData['children_disable_details'] ?? $existingData->children_disable_details,
            'fathers_name' => $requestData['fathers_name'] ?? $existingData->fathers_name,
            'fathers_etin' => $requestData['fathers_etin'] ?? $existingData->fathers_etin,
            'mothers_name' => $requestData['mothers_name'] ?? $existingData->mothers_name,
            'mothers_etin' => $requestData['mothers_etin'] ?? $existingData->mothers_etin,
            // employee profile
            'profession' => $requestData['profession'] ?? $existingData->profession,
            'type_of_profession' => $requestData['type_of_profession'] ?? $existingData->type_of_profession,
            'employee_id' => $requestData['employee_id'] ?? $existingData->employee_id,
            'name_of_employer' => $requestData['name_of_employer'] ?? $existingData->name_of_employer,
            'bin' => $requestData['bin'] ?? $existingData->bin,
            'etin_business' => $requestData['etin_business'] ?? $existingData->etin_business,
            'office_address' => $requestData['office_address'] ?? $existingData->office_address,
            'office_city' => $requestData['office_city'] ?? $existingData->office_city,
            'office_post_code' => $requestData['office_post_code'] ?? $existingData->office_post_code,
            'office_country' => $requestData['office_country'] ?? $existingData->office_country,
            //#### practitioners profile
            'type_of_practitioner' => $requestData['type_of_practitioner'] ?? $existingData->type_of_practitioner,
            'license_no' => $requestData['license_no'] ?? $existingData->license_no,
            'trade_license_no' => $requestData['trade_license_no'] ?? $existingData->trade_license_no,
            //authorization
            'authorization_name' => $requestData['authorization_name'] ?? $existingData->authorization_name,
            'authorization_designation' => $requestData['authorization_designation'] ?? $existingData->authorization_designation,
            'authorization_phone_no' => $requestData['authorization_phone_no'] ?? $existingData->authorization_phone_no,
            'authorization_email' => $requestData['authorization_email'] ?? $existingData->authorization_email,
            'authorization_authority' => $requestData['authorization_authority'] ?? $existingData->authorization_authority,
            'authorization_file' => $requestData['authorization_file'] ?? $existingData->authorization_file,
            //service plan
            'no_of_employee' => $requestData['no_of_employee'] ?? $existingData->no_of_employee,
            'discount_coupon' => $requestData['discount_coupon'] ?? $existingData->discount_coupon,
            'total_cost' => $requestData['total_cost'] ?? $existingData->total_cost,
            // #### Corporate Profile
            //company profile
            'company_logo' => $requestData['company_logo'] ?? $existingData->company_logo,
            'company_name' => $requestData['company_name'] ?? $existingData->company_name,
            'type_of_business' => $requestData['type_of_business'] ?? $existingData->type_of_business,
            'incorporation_no' => $requestData['incorporation_no'] ?? $existingData->incorporation_no,
        ];
        // Handle file uploads
        if (isset($requestData['company_logo']) && $requestData['company_logo']->isValid()) {
            // Delete old logo if exists
            if ($existingData && $existingData->company_logo) {
                Storage::delete($existingData->company_logo);
            }
            // Store the new logo and save the path
            $data['company_logo'] = $requestData['company_logo']->store('company_logos');
        }
        // Handle other fields similarly
        if (isset($requestData['authorization_file']) && $requestData['authorization_file']->isValid()) {
            if ($existingData && $existingData->authorization_file) {
                Storage::delete($existingData->authorization_file);
            }

            $data['authorization_file'] = $requestData['authorization_file']->store('authorization_files');
        }

        return $data;
    }
}
