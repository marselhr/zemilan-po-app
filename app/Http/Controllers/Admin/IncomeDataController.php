<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\IncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Order;

class IncomeDataController extends Controller
{
    public function index()
    {
        $user = User::all();
        $income_data = Order::all();
        return view('admin.pages.income-data.index', compact('user', 'income_data'));
    }

    public function export()
    {
        // Eager load the user relationship for export (opsional)
        $income_data = Order::with('user')->get();

        return Excel::download(new IncomeExport($income_data), 'income_data.xlsx');
    }
}
