<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_sale;
use App\Models\Stock;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;

        $products = Product::all();

        // dd($products);

        $user_sales = Product_sale::where('user_id', $user_id)->where('created_at', today())->get();

        return view('pages.sales', compact('user_sales', 'products'));
    }

    public function store(Request $request){
        
        $validated_data = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        $validated_data['user_id'] = Auth::user()->id;

        DB::beginTransaction();

        try {
    
            $stock = Stock::where('product_id', $request->input('product_id'))->first();

            if ($stock->quantity < $request->input('quantity')) {
                return back()->withErrors([
                    'quantity' => 'Invalid quantity. No available stocks'
                ])->onlyInput('quantity');
            }
            
            Product_sale::create($validated_data);

            $stock->update([
                'quantity' => $stock->quantity - $request->input('quantity')
            ]);

            DB::commit();

            ToastMagic::success('sales made successfully');
    
            return back();
        } catch (\Throwable $th) {

            DB::rollBack();

            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }

    }
}
