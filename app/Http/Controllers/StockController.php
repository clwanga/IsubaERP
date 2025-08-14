<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    public function index(){
        $products = Product::whereDoesntHave('stock')->get();
        $stocks = Stock::with(['product', 'user'])->latest()->get();

        return view('pages.inventory', compact('products', 'stocks'));
    }

    public function store(Request $request){

        $validated_data = $request->validate([
            'product_id' => 'required|string|max:30',
            'quantity' => 'required|integer',
        ]);

        //created by logic
        $validated_data['created_by'] = Auth::user()->id;
        
        try {
            
            $stock = Stock::create($validated_data);

            //status logic
            if($stock->quantity < 10){
                $stock->update([
                'status' => 'low'
                ]);
            }else{
                $stock->update([
                    'status' => 'high'
                ]);
            }

            ToastMagic::success('operation successfully');
            
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }

    }

    public function update(Request $request){

    }
}
