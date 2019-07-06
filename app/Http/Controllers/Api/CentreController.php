<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\centre;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return centre::get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(centre $centre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(centre $centre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, centre $centre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(centre $centre)
    {
        //
    }
}
