<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month', date('m'));
        $year = $request->get('year', date('Y'));
        
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        
        $employees = Employee::with(['attendances' => function($query) use ($month, $year) {
            $query->whereMonth('date', $month)->whereYear('date', $year);
        }])->get();

        return view('admin.attendances.index', compact('employees', 'daysInMonth', 'month', 'year'));
    }
}
