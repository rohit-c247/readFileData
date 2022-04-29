<?php

namespace App\Imports;

use App\Models\Address;
use App\Models\EmpRole;
use App\Models\Employee;
use App\Models\OrgSubDate;
use App\Models\Organization;
use App\Models\EmployeeAddress;
use Illuminate\Support\Collection;
use App\Models\PointepaySubscription;
use App\Models\OrganizationIncomDetail;
use App\Models\OrganizationSubscription;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\OrganizationSubscriptionRequest;

class ImportFileData implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $Organization = Organization::create([
                'organizationName' => $row['organization_name'],
                'isPointePay' => 1,
                'isDelete' => 0,
                'createDt' => date('Y-m-d H:i:s'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
                'phoneCode' => $row['business_phone_code'],
                'dbaName' => $row['store_dba_name'],
            ]);
            if (!$Organization->id) {
                return;
            }
            $Employee = Employee::create([
                'organizationId' => $Organization->id,
                'userName' => $row['username'],
                'email' => $row['email'],
                //'password' => password_encrypt($row['Store DBA Name']),
                'firstName' => $row['first_name'],
                'lastName' => $row['last_name'],
                'active' => 1,
                'isDelete' => 0,
                //'createBy' => $arr['employeeId'],
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $arr['employeeId'],
                'lastModifiedDt' => date('Y-m-d H:i:s'),
                //'is_single_store' => $is_single_store,
            ]);
            if (!$Employee->id) {
                return;
            }
            $Address = Address::create([
                'createBy' => $Employee->id,
                'createDt' => date('Y-m-d H:i:s'),
                'lastModifiedBy' => $Employee->id,
                'lastModifiedDt' => date('Y-m-d H:i:s'),
                'addressLine1' => $row['address'],
                'city' => $row['city'],
                'state' => $row['state'],
                //'country' => $row['countryId'],
                'zip' => $row['zipcode'],
            ]);
            if (!$Address->id) {
                return;
            }
            $EmployeeAddress = EmployeeAddress::create([
                'employeeId' => $Employee->id,
                'addressId' => $Address->id,
                'addressTypeId' => 1,
                'active' => 1,
                'createDt' => date('Y-m-d H:i:s'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $this->session->userdata('userId'),
            ]);

            $EmpRole = EmpRole::create([
                'organizationId' => $Organization->id,
                'employeeId' => $Employee->id,
                'roleId' => 1, //$roleId,
                'active' => 1,
                //'createBy' => $this->session->userdata('userId'),
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $this->session->userdata('userId'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
            ]);

            $PointepaySubscription = PointepaySubscription::create([
                'subscriptionPlanId' => 1, //$subscriptionPlanId,
                'firstName' => $row['first_name'],
                'lastName' => $row['last_name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'totalAmount' => 10, //$row['totalAmount'], update static for now
                //'subscriptionPriceId' => $arr['subscriptionPriceId'],
                'status' => 1,
                'active' => 1,
                'isDelete' => 0,
                'createBy' => $Employee->id,
                'createDt' => date('Y-m-d H:i:s'),
                'lastModifiedBy' => $Employee->id,
                'lastModifiedDt' => date('Y-m-d H:i:s'),
            ]);
            if (empty($PointepaySubscription)) {
                return;
            }

            $OrganizationSubscription = OrganizationSubscription::create([
                'organizationId' => $Organization->id,
                // 'pointepaySubscriptionId' => $arr['pointepaySubscriptionId'],
                // 'subscriptionPriceId' => $arr['subscriptionPriceId'],
                // 'subscriptionDt' => $arr['subscriptionDt'],
                // 'subscriptionEndDt' => $arr['subscriptionEndDt'],
                'sit' => 1,
                'active' => 1,
                'isDelete' => 0,
                //'createBy' => $this->session->userdata('userId'),
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $this->session->userdata('userId'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
            ]);

            $OrganizationSubscriptionRequest = OrganizationSubscriptionRequest::create([
                'organizationSubscriptionId' => $OrganizationSubscription->id,
                'requestStatus' => 5,
                'active' => 1,
                'isDelete' => 0,
                //'createBy' => $this->session->userdata('userId'),
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $this->session->userdata('userId'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
            ]);

            $OrgSubDate = OrgSubDate::create([
                'organizationId' => $Organization->id,
                //'organizationSubscriptionId' => $arr['organizationSubscriptionId'],
                //'subscriptionPlanId' => $arr['subscriptionPlanId'],
                //'subscriptionPriceId' => $arr['subscriptionPriceId'],
                //'subscriptionDt' => $arr['subscriptionDt'],
                //'subscriptionEndDt' => $arr['subscriptionEndDt'],
                'active' => 1,
                'isDelete' => 0,
                //'createBy' => $this->session->userdata('userId'),
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifiedBy' => $this->session->userdata('userId'),
                'lastModifiedDt' => date('Y-m-d H:i:s'),
            ]);

            $OrganizationIncomDetail = OrganizationIncomDetail::create([
                'organizationId' => $Organization->id,
                'employeeId' => $Employee->id,
                'retailerName' => $row['organization_name'],
                'active' => 1,
                'isDelete' => 0,
                //'createBy' => $this->session->userdata('userId'),
                'createDt' => date('Y-m-d H:i:s'),
                //'lastModifyBy' => $this->session->userdata('userId'),
                'lastModifyDt' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
