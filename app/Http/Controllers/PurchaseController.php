<?php

namespace App\Http\Controllers;

use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Models\Purchase;
use App\Models\provider;
use App\Providers;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Provider as ModelsProvider;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index',compact('purchases'));
    }

    public function create()
    {
       $providers = Provider::get();
        return view('admin.purchase.create',compact('providers'));

    }

    
    public function store(StoreRequest $request)
    {
       $purchase = Purchase::create($request->all());

       foreach ($request -> product_id as $key => $value) {

        $results[]=array('product_id'=>$request->product_id[$key],
        'quantily'=>$request->quantily[$key], 'price'=> $request->price[$key]);

    }

    $purchase->shoppingDetails()->createMany($results);

    
        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
       return view('admin.purchase.show',compact('purchase'));
    }

    
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.show',compact('purchase'));
    }

    
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    
    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index');
        
    }
      }
