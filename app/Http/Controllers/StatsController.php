<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use \NumberFormatter;

class StatsController extends Controller
{
    public function index()
    {
//        $usersCount = User::where('created_at', '>=', now()->subDays(30))->count();
//        $ordersCount = Order::where('created_at', '>=', now()->subDays(30))->count();
//        $revenue = Order::where('created_at', '>=', now()->subDays(30))->sum('total');
//        $revenue = (new NumberFormatter('en_US', NumberFormatter::CURRENCY))->formatCurrency($revenue / 100, 'PLN');
        return view('livewire.stats',[
//            'usersCount' => $usersCount,
//            'ordersCount' => $ordersCount,
//            'revenue' => $revenue

        ]);
    }
}
