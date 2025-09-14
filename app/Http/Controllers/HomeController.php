<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product_sale;

class HomeController extends Controller
{
    public function index(){
        //chart js data 
        $usersByNameInitial = Product_sale::selectRaw("products.name, sum(amount) as total")
        ->join('products', 'product_sales.product_id', '=', 'products.id')
        ->groupBy('products.name')
        ->orderBy('products.name')
        ->pluck('total', 'products.name');

        $labels = $usersByNameInitial->keys();
        $data = $usersByNameInitial->values();

        //sales data
        $sales_amount = Product_sale::sum('amount');

        return view('pages.dashboard', [
            'labels' => $labels,
            'data' => $data,
            'sales_amount' => $sales_amount
        ]);
    }

    // public function openChartPage()
    // {
    //     $usersByNameInitial = \App\Models\User::selectRaw("UPPER(LEFT(name, 1)) as initial, COUNT(*) as total")
    //     ->groupBy('initial')
    //     ->orderBy('initial')
    //     ->pluck('total', 'initial');

    //     return view('charts', [
    //         'labels' => $usersByNameInitial->keys(),
    //         'data' => $usersByNameInitial->values(),
    //     ]);
    // }

}
