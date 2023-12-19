<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function index() {
        $sold_items = SoldItem::orderBy('id')->get();
        
        return response()->json($sold_items);
    }

    public function view(SoldItem $sold_item) {
        $sold_item->load('sale', 'merchandise');
        return response()->json($sold_item);
    }

    public function store(Request $request, SoldItem $sold_item) {
        $fields = $request->validate([
            'merchandise_id' => 'required|exists:merchandises,id',
            'sale_id' => 'required|exists:sales,id',
            'qty' => 'required|integer',
            'selling_price' => 'required|integer',
        ]);

        $sold_item = SoldItem::create($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Sold item item with ID# ' .$sold_item->id . ' has been created'
        ]);
    }

    public function update(Request $request, SoldItem $sold_item) {
        $fields = $request->validate([
            'merchandise_id' => 'exists:merchandises,id',
            'sale_id' => 'exists:sales,id',
            'qty' => 'integer',
            'selling_price' => 'integer',
        ]);

        $sold_item->update($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Sold item item with ID# ' .$sold_item->id . ' has been updated'
        ]);
    }

    public function destroy(SoldItem $sold_item){
        $details = $sold_item->company_name;
        $sold_item->delete();

        return response()->json([
            'status' => "OK",
            'message' => 'Sold item item with the name ' .$details . ' has been deleted'
        ]);
    }
}
