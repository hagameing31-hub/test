<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('name')->get();
        return view('checkin', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'action' => 'required|in:checkin,checkout'
        ]);

        $employeeId = $request->employee_id;
        $today = Carbon::today()->format('Y-m-d');
        $now = Carbon::now()->format('H:i:s');
        $action = $request->action;

        $attendance = Attendance::where('employee_id', $employeeId)
            ->where('date', $today)
            ->first();

        if ($action === 'checkin') {
            if ($attendance) {
                return back()->with('error', 'Bạn đã check-in hôm nay rồi!');
            }

            // Logic to determine status based on time (e.g. late after 08:30)
            $status = 'X';
            if (Carbon::now()->format('H:i') > '08:30') {
                $status = 'M';
            }

            Attendance::create([
                'employee_id' => $employeeId,
                'date' => $today,
                'check_in' => $now,
                'status' => $status
            ]);

            return back()->with('success', 'Check-in thành công lúc ' . $now);

        } elseif ($action === 'checkout') {
            if (!$attendance) {
                return back()->with('error', 'Bạn chưa check-in hôm nay!');
            }

            if ($attendance->check_out) {
                return back()->with('error', 'Bạn đã check-out hôm nay rồi!');
            }

            $attendance->update([
                'check_out' => $now
            ]);

            return back()->with('success', 'Check-out thành công lúc ' . $now);
        }

        return back();
    }
}
