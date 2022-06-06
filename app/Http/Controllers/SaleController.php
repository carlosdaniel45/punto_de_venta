<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Client;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index',compact('sales'));
    }

    public function create()
    {
        $clients = Client::get();
        return view('admin.sales.create',compact('providers'));

    }

    
    public function store(StoreRequest $request)
    {
       $sale = Sale::create($request->all());

       foreach ($request -> product_id as $key => $value) {

        $results[]=array(
            'product_id'=>$request->product_id[$key],
            'quantily'=>$request->quantily[$key], 
            'price'=> $request->price[$key],
            'disconut'=>$request->discount[$key]);

    }

    $sale->saleDetails()->createMany($results);

    
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sales)
    {
       return view('admin.sales.show',compact('sales'));
    }

    
    public function edit(Sale $sales)
    {
        $clients = Client::get();

        return view('admin.sales.show',compact('sales'));
    }

    
    public function update(UpdateRequest $request, Sale $sales)
    {
        //$sales->update($request->all());
        //return redirect()->route('sales.index');
    }

    
    public function destroy(Sale $sales)
    {
        //$sales->delete();
        //return redirect()->route('sales.index');
        
    }
}
