<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        $usersCount = User::where('created_at', '>=', now()->subDays(30))->count();
        $ordersCount = Order::where('created_at', '>=', now()->subDays(30))->count();
        $revenue = Order::where('created_at', '>=', now()->subDays(30))->sum('total');
        return view('livewire.stats',[
            'usersCount' => $usersCount,
            'ordersCount' => $ordersCount,
            'revenue' => $revenue

        ]);
    }
}
