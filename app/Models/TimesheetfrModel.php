<?php

namespace App\Models;

use CodeIgniter\Model;


class TimesheetfrModel extends Model
{
    protected $table      = 'timesheet_fr';
    // protected $primaryKey = 'id_timesheet_import';
    // protected $useTimestamps = true;
    // protected $useAutoIncrement = true;
    protected $allowedFields = ['timesheetid', 'fingerprintid', 'employeeid', 'date_import', 'tap_in', 'tap_out', 'timesheet_description'];

    public function getFingerIDTAPIN($date_import, $fingerprintid)
    {
        return $this->db->table('timesheet_fr')
            ->where('fingerprintid', $fingerprintid)
            ->where('date_import', $date_import)
            ->get()->getRow();
    }
    public function getEmployeeIDIDTAPIN($date_import, $employeeid)
    {
        return $this->db->table('timesheet_fr')
            ->where('employeeid', $employeeid)
            ->where('date_import', $date_import)
            ->get()->getRow();
    }
}
