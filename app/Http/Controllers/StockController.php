<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Stock;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
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
            'buying_price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        //created by logic
        $validated_data['created_by'] = Auth::user()->id;
        
        DB::beginTransaction();
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

            //select the product and update buying price 
            $product = Product::where('id', $stock->product_id)->firstOrFail();

            //update the buying price
            $product->update([
                'buying_price' => $validated_data['buying_price']
            ]);

            DB::commit();

            ToastMagic::success('operation successfully');
            
            return back();
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }

    }

    public function updateQuantity(Request $request, Stock $stock){
        $validated = $request->validate([
            'quantity' => 'required|integer|numeric',
            'buying_price' => 'integer'
        ]);

        DB::beginTransaction();
        try {
            $current_stock = Stock::where('id', $stock->id)->first();

            $updated_quantity = $current_stock->quantity + $validated['quantity'];

            $status = '';

            ($updated_quantity < 10) ? $status = 'low': $status = 'high'; 

            $stock->update([
                'quantity' => $updated_quantity,
                'buying_price' => $validated['buying_price'],
                'status' => $status
            ]);

            PurchaseItem::create([
                'product_id' => $current_stock->product_id,
                'quantity' => $validated['quantity'],
                'buying_price' => $validated['buying_price'],
                'created_by' => Auth::user()->id
            ]);

            //select the product and update buying price 
            $product = Product::where('id', $current_stock->product_id)->firstOrFail();

            //update the buying price
            $product->update([
                'buying_price' => $validated['buying_price']
            ]);

            DB::commit();

            ToastMagic::success('update succeded');
            return back();

        } catch (\Throwable $th) {
            
            DB::rollBack();
            Log::error('Error while updating stocks', [
                'code' => $th->getCode(),
                'message' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }

    public function update(Request $request, Stock $stock){
        dd($stock);
    }

    public function destroy(Stock $stock){
        try {
            $stock->delete();

            ToastMagic::success('stock deleted successfully');
            return back();

        } catch (\Throwable $th) {
            Log::error($th->getMessage(), [
                'code' => $th->getCode()
            ]);

            ToastMagic::error('An error occurred. Contact your IT Admin');
        }
    }
}
