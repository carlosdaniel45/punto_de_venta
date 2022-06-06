<?php

namespace App\Http\Controllers;

use App\Models\provider;
use App\Http\Requests\StoreproviderRequest;
use App\Http\Requests\UpdateproviderRequest;

class providerController extends Controller
{
    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index',compact('providers'));
    }

    public function create()
    {
        return view('admin.provider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproviderRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(provider $provider)
    {
       return view('admin.provider.show',compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(provider $provider)
    {
        return view('admin.provider.show',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproviderRequest  $request
     * @param  \App\Models\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproviderRequest $request, provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }

    
    public function destroy(provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
        
    }
}
