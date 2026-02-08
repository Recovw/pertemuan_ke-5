<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function showItem()
    {
        $itemList = Item::all();
        return view('welcome', compact('itemList'));
    }

    public function showCreate()
    {
        return view('create');
    }

    public function create(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|string',
            'description' => 'required|min:3|string',
            'stock' => 'required|min:0|integer'
        ]);

        Item::create([
            'name' => $req->name,
            'description' => $req->description,
            'stock' => $req->stock
        ]);

        return redirect()->route('showItem');
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|min:3|string',
            "description" => 'required|min:3|string',
            'stock' => 'required|min:0|integer'
        ]);

        $item = Item::findOrFail($id);
        $item->name = $req->name;
        $item->description = $req->description;
        $item->stock = $req->stock;

        $item->save();

        return redirect()->route('showItem');
    }

    public function showUpdate($id)
    {
        $item = Item::findOrFail($id);
        return view('update', compact('item'));
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('showItem');
    }
}
