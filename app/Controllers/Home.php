<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TimesheetModel;
use App\Models\TimesheetfrModel;

class Home extends BaseController
{
    protected $timesheetModel;
    protected $timesheetFRModel;
    protected $resourcesModel;

    public function __construct()
    {
        $this->timesheetModel = new TimesheetModel();
        $this->timesheetFRModel = new TimesheetfrModel();
        $this->resourcesModel = new UsersModel();
    }

    public function index()
    {
        // // Manual tanggal
        // date('j');
        // $start_date = new \DateTime('2024-09-21');
        // $end_date = new \DateTime('2024-10-21');
        // $daterange = new \DatePeriod($start_date, new \DateInterval('P1D'), $end_date);
        // $resources = $this->resourcesModel->getResourcesTotal();

        // $this->timesheetModel->save([
        //     'period' => $end_date->format('Y-m'),
        //     'status_import' => 2,
        //     'created_by' => 'System Attendance',
        // ]);
        // $lastid = $this->timesheetModel->getInsertID();
        // foreach ($resources as $listresources) {
        //     foreach ($daterange as $listdaterange) {
        //         $this->timesheetFRModel->save([
        //             'timesheetid' => $lastid,
        //             'fingerprintid' => $listresources['id_fingerprint'],
        //             'employeeid' => $listresources['username'],
        //             'date_import' => $listdaterange->format('Y-m-d'),
        //         ]);
        //     }
        // }


        // // Otomatis setial tanggal 21
        // if (date('j') == 21) {
        //     $start_date = date('Y-m-d');
        //     $end_date = date("Y-m-d", strtotime("+1 months", strtotime($start_date)));
        //     $startdate = \DateTime::createFromFormat("Y-m-d", $start_date);
        //     $enddate = \DateTime::createFromFormat("Y-m-d", $end_date);
        //     $daterange = new \DatePeriod($startdate, new \DateInterval('P1D'), $enddate);
        //     $resources = $this->resourcesModel->getResourcesTotal();

        //     $this->timesheetModel->save([
        //         'period' => $enddate->format('Y-m'),
        //         'status_import' => 2,
        //         'created_by' => 'System Attendance',
        //     ]);
        //     $lastid = $this->timesheetModel->getInsertID();
        //     foreach ($resources as $listresources) {
        //         foreach ($daterange as $listdaterange) {
        //             $this->timesheetFRModel->save([
        //                 'timesheetid' => $lastid,
        //                 'fingerprintid' => $listresources['id_fingerprint'],
        //                 'employeeid' => $listresources['username'],
        //                 'date_import' => $listdaterange->format('Y-m-d'),
        //             ]);
        //         }
        //     }
        // }

        $files_attendace = directory_map('assets/logfile');
        // $address = 'http://localhost/attedance/20241018_150502_LogFRAttendance.txt';
        // $xmlstr = preg_split('/\s+/', file_get_contents($address));
        // foreach ($xmlstr as $listxmlstr) {
        //     $FRYear = substr($listxmlstr, 0, 4);
        //     $FRMonth = substr($listxmlstr, 4, 2);
        //     $FRDay = substr($listxmlstr, 6, 2);
        //     $FRHour = substr($listxmlstr, 8, 2);
        //     $FRMinute = substr($listxmlstr, 10, 2);
        //     $date_import = $FRYear . '-' . $FRMonth . '-' . $FRDay;
        //     $fulltap = $date_import . ' ' . $FRHour . ':' . $FRMinute . ':00';
        //     $FRIDEmployee  = substr($listxmlstr, 12);
        //     // dd($FRIDEmployee);
        //     $FingerTAPIN = $this->timesheetFRModel->getFingerIDTAPIN($date_import, $FRIDEmployee);
        //     $EmployeeIDTAPIN = $this->timesheetFRModel->getEmployeeIDIDTAPIN($date_import, $FRIDEmployee);
        //     // dd($EmployeeIDTAPIN);

        //     dd(date("Y-m-d", strtotime($fulltap)));


        //     if (date("j", strtotime($fulltap))) {
        //     }
        //     if ($FingerTAPIN != NULL) {
        //         if ($FingerTAPIN->tap_in == NULL && $FingerTAPIN->tap_out == NULL) {
        //             $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_in', $fulltap)->update();
        //         } elseif ($FingerTAPIN->tap_in != NULL && $FingerTAPIN->tap_out == NULL) {
        //             $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_out', $fulltap)->update();
        //         }
        //     }
        // }
        $data['title'] = 'Home';
        $data['logfile'] = $files_attendace;
        // dd($data);
        return view('attendance/index', $data);
    }

    public function sync($logfile)
    {
        // $files_attendace = directory_map('assets/logfile');
        // $address = 'http://localhost/attedance/' . $logfile;
        $address = base_url('assets/logfile/') . $logfile;
        $xmlstr = preg_split('/\s+/', file_get_contents($address));
        foreach ($xmlstr as $listxmlstr) {
            $FRYear = substr($listxmlstr, 0, 4);
            $FRMonth = substr($listxmlstr, 4, 2);
            $FRDay = substr($listxmlstr, 6, 2);
            $FRHour = substr($listxmlstr, 8, 2);
            $FRMinute = substr($listxmlstr, 10, 2);
            $date_import = $FRYear . '-' . $FRMonth . '-' . $FRDay;
            $fulltap = $date_import . ' ' . $FRHour . ':' . $FRMinute . ':00';
            $FRIDEmployee  = substr($listxmlstr, 12);
            // dd($FRIDEmployee);
            $FingerTAPIN = $this->timesheetFRModel->getFingerIDTAPIN($date_import, $FRIDEmployee);
            $EmployeeIDTAPIN = $this->timesheetFRModel->getEmployeeIDIDTAPIN($date_import, $FRIDEmployee);

            $timeattendance = date("G", strtotime($fulltap));
            if ($timeattendance <= 4) {
                $datebefore = date('Y-m-d', strtotime('-1 day', strtotime($date_import)));
                if ($FingerTAPIN != NULL) {
                    if ($FingerTAPIN->tap_in == NULL && $FingerTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_in', $fulltap)->update();
                    } elseif ($FingerTAPIN->tap_in != NULL && $FingerTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_out', $fulltap)->update();
                    }
                }

                if ($EmployeeIDTAPIN != NULL) {
                    if ($EmployeeIDTAPIN->tap_in == NULL && $EmployeeIDTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('employeeid', $FRIDEmployee)->where('date_import', $datebefore)->set('tap_out', $fulltap)->update();
                    } elseif ($EmployeeIDTAPIN->tap_in != NULL && $EmployeeIDTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('employeeid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_out', $fulltap)->update();
                    }
                }
            } elseif ($timeattendance > 4) {
                if ($FingerTAPIN != NULL) {
                    if ($FingerTAPIN->tap_in == NULL && $FingerTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_in', $fulltap)->update();
                    } elseif ($FingerTAPIN->tap_in != NULL && $FingerTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('fingerprintid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_out', $fulltap)->update();
                    }
                }

                if ($EmployeeIDTAPIN != NULL) {
                    if ($EmployeeIDTAPIN->tap_in == NULL && $EmployeeIDTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('employeeid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_in', $fulltap)->update();
                    } elseif ($EmployeeIDTAPIN->tap_in != NULL && $EmployeeIDTAPIN->tap_out == NULL) {
                        $this->timesheetFRModel->where('employeeid', $FRIDEmployee)->where('date_import', $date_import)->set('tap_out', $fulltap)->update();
                    }
                }
            }
        }
        unlink('assets/logfile/' . $logfile);
        session()->setFlashdata('success', 'Log File Attendance ' . $logfile . ' Succesfull Sync');
        return redirect()->back();
    }
}
