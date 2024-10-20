<?php

namespace App\Models;

use CodeIgniter\Model;


class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;
    protected $allowedFields = ['email', 'id_fingerprint', 'username', 'fullname', 'password_hash', 'address', 'gender_id', 'pob', 'dob', 'religion_id', 'project_id', 'position', 'mobile', 'material_id', 'kancab_id', 'customer_id', 'image', 'qrcode_vcard', 'ktp_no', 'ktp_file', 'status', 'note', 'start_join', 'finish_join', 'req_member', 'transaction', 'employee_status', 'member_kopnec', 'contract_status', 'sign_digital', 'active', 'darkmode', 'twofa', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    public function getResourcesTotal()
    {
        $status = array('1', '2', '5');
        return $this->db->table('users')
            ->select('username')
            ->select('id_fingerprint')
            ->where('active', 1)
            ->where('employee_status', 2)
            ->whereIn('contract_status', $status)
            ->get()->getResultArray();
    }
}
