<?php

namespace App\Models;

use CodeIgniter\Model;


class TimesheetModel extends Model
{
    protected $table      = 'timesheet';
    protected $primaryKey = 'id_timesheet';
    protected $useTimestamps = true;
    protected $useAutoIncrement = true;
    protected $allowedFields = ['period', 'status_import', 'csv_file', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'];

    public function getIndexTimesheet()
    {
        return $this->db->table('timesheet')
            ->orderBy('period', 'DESC')
            ->get()->getResultArray();
    }

    public function getTimesheetID($id)
    {
        return $this->db->table('timesheet')
            ->where('id_timesheet', $id)
            ->orderBy('period', 'DESC')
            ->get()->getRow();
    }

    public function getTimesheetPeriod($period)
    {
        return $this->db->table('timesheet')
            ->where('period', $period)
            ->get()->getRow();
    }
}
