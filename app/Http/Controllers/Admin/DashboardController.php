<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mock data for website visitors (last 7 days)
        $visitorDates = collect(range(6, 0))->map(fn($days) => now()->subDays($days)->format('d/m'))->values();
        $visitorCounts = collect(range(6, 0))->map(fn() => rand(50, 300))->values();

        // Real data for Expenses (last 7 days)
        $expensesData = \App\Models\Expense::where('expense_date', '>=', now()->subDays(7))
            ->orderBy('expense_date')
            ->get()
            ->groupBy('expense_date')
            ->map(function ($row) {
                return $row->sum('amount');
            });
            
        $expenseDates = $visitorDates; // Align with visitor dates for simplicity
        $expenseAmounts = $visitorDates->map(function($date) use ($expensesData) {
            $fullDate = now()->startOfMonth()->format('Y-m-') . explode('/', $date)[0]; // Approximation
            return $expensesData->get($fullDate, 0);
        });

        return view('admin.dashboard', compact('visitorDates', 'visitorCounts', 'expenseAmounts'));
    }

    public function statistic()
    {
        $skillCount = \App\Models\Skill::count();
        $experienceCount = \App\Models\Experience::count();
        $projectCount = \App\Models\Project::count();
        // Assuming page views are stored somewhere, we mock it for now
        $viewCount = 1204; 

        return view('admin.statistic', compact('skillCount', 'experienceCount', 'projectCount', 'viewCount'));
    }
}
