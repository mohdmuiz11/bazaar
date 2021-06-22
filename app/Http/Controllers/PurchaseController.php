<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Item;
use App\Models\Category;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // to retrieve data available for that particular customer
        $purchases = Auth::user()->purchases;
        return view('customer.orders', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // browsing marketplaces for customers according to categories
        // no search queries, so no
        $categories = Category::all();
        return view('customer.marketplace', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // validation process, incase if user put some weird data inside this
        // $request->validate([
        //     'itemID'=>'required',
        //     'custID'=>'required',
        //     'purchase_date' => 'required|date',
        //     'quantity'=>'required|numeric'
        // ]);

        $checkpurchase = Auth::user()->purchases;

        // check if the item is duplicated
        foreach ($checkpurchase as $count => $somepurchase) {
            if ($somepurchase->itemID == $request->get('itemID')){
                ++$somepurchase->quantity;
                $somepurchase->save();
                return redirect('/orders')->with('success', 'The item has been added to your orders!');
            }
        }

        $todaydate = Carbon::now()->toDateString();

        // storing all datas here into "purchases" table in database
        $purchase = new Purchase([
            'itemID' => $request->get('itemID'),
            'custID' => Auth::id(), //automatically assigned user's id to this foreign key
            'purchase_date' => $todaydate,
            'quantity' => '1' // default to one quantity, can be edit later
        ]);
        $purchase->save();

        // success message, you can edit it as you like
        return redirect('/orders')->with('success', 'The item has been added to your orders!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show details about item maybe??
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // The only thing customer can edit is quantity so bruh
        $purchase = Purchase::find($id);
        $item = Purchase::find($id)->item;
        return view('customer.edit-purchase', compact('item','purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation process, incase if user put some weird data inside this
        $request->validate([
            'quantity'=>'required|numeric|gt:0' // must be above 0, if you want it 0, just delete it lmao
        ]);

        // updating all the data from view edit-purchase using PATCH
        // then update relevant details into "purchase" of the "purchases" table
        $purchase = Purchase::find($id);
        $purchase->quantity =  $request->get('quantity');
        $purchase->save();

        // success message, you can edit it as you like
        return redirect('/orders')->with('success', 'All changes are saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the purchase's id in "purchases", then deletes it
        $purchase = Purchase::find($id);
        $purchase->delete();

        // success message, you can edit it as you like
        return redirect('/orders')->with('success', 'The select purchase has been deleted!');
    }
}
