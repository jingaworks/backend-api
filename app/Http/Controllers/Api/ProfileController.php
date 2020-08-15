<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProfileResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = auth()->user()->profile()->create($request->all());
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $profile = auth()->user()->profile;
        return  new ProfileResource(auth()->user()->profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        auth()->user()->profile()->update($request->all());
        return  new ProfileResource(auth()->user()->profile);
    }
}
