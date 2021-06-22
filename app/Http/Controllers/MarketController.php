<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MarketController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $id = $request->get('catID');
        $items = Category::find($id)->items;
        $currentcategory = Category::find($id);
        $categories = Category::all();
        return view('customer.category', compact('items', 'categories', 'currentcategory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {

    }
}
