<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ViewReports() {
        $orders = Order::latest()->get();
        return view('admin.reports.view_reports',compact('orders'));

    }
    public function ViewUsers() {
        $users = User::latest()->get();
        return view('admin.reports.view_users',compact('users'));

    }

    public function SearchByDate(Request $request) {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        
        return view('admin.reports.view_reports',compact('orders'));
    }

}
