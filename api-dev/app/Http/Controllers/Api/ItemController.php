<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('perPage', 5);
        $items = Item::paginate($perPage);

        return response()->json($items);
    }

    public function show($id){
        $item = Item::find($id);

        return response()->json($item);
    }

public function store(Request $request){
    $data = $request->only('name', 'qty', 'color', 'price', 'weight');
    $item = Item::create($data);

    return response()->json($item);
}

public function update(Request $request, $id){

    $data = $request->only('name','qty','color','price','weight');
    $item = Item::find($id);
    $item->update($data);

    return response()->json($item);
}

public function destroy($id){
    $item = Item::find($id);
    $item->delete();

    return response()->json(['status' => 'success']);
}

}
