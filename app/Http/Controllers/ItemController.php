<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('supplier.inventory', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.createitem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name'=>'required|string|max:100',
            'item_price'=>'required',
            'item_available_unit'=>'required|numeric'
        ]);
        $items = new Item([
            'item_name' => $request->get('item_name'),
            'item_price' => $request->get('item_price'),
            'item_available_unit' => $request->get('item_available_unit')
        ]);
        $items->save();
        return redirect('/inventory')->with('success', 'Your items have been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $item = Item::find($id);
        // return view('students.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name'=>'required|string|max:100',
            'item_price'=>'required|numeric',
            'item_available_unit'=>'required|numeric'
        ]);

        $items = Item::find($id);
        $items->item_name =  $request->get('item_name');
        $items->item_price = $request->get('item_price');
        $items->item_available_unit = $request->get('item_available_unit');
        $items->save();
        return redirect('/inventory')->with('success', 'All changes are saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id);
        $items->delete();
        return redirect('/inventory')->with('success', 'The select item has been deleted!');
    }
}
