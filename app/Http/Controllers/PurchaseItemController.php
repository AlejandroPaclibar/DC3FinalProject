<?php

namespace App\Http\Controllers;

use App\Models\Purchase_item;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    public function index() {
        $purchased_item = Purchase_item::orderBy('id')->get();
        
        return response()->json($purchased_item);
    }

    public function view(Purchase_item $purchased_item) {
        
        $purchased_item->load('purchase','merchandise');

        return response()->json($purchased_item);
    }

    public function store(Request $request, Purchase_item $purchased_item) {
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'purchase_id' => 'required|exists:purchases,id',
            'whole_sale_qty' => 'required|integer',
            'purchase_price' => 'required|integer',
        ]);

        $purchased_item = Purchase_item::create($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Purchased item with ID# ' .$purchased_item->id . ' has been created'
        ]);
    }

    public function update(Request $request, Purchase_item $purchased_item) {
        $fields = $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'purchase_id' => 'exists:purchases,id',
            'whole_sale_qty' => 'integer',
            'purchase_price' => 'integer',
        ]);

        $purchased_item->update($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Purchased item with ID# ' .$purchased_item->id . ' has been updated'
        ]);
    }

    public function destroy(Purchase_item $purchased_item){
        $details = $purchased_item->company_name;
        $purchased_item->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Purchased item with the name ' .$details . ' has been deleted'
        ]);
    }
}
