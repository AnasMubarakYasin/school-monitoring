<?php

namespace App\Http\Controllers;

use App\Models\LetterPrinting;
use App\Http\Requests\StoreLetterPrintingRequest;
use App\Http\Requests\UpdateLetterPrintingRequest;

class LetterPrintingController extends Controller
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
     * @param  \App\Http\Requests\StoreLetterPrintingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLetterPrintingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LetterPrinting  $letterPrinting
     * @return \Illuminate\Http\Response
     */
    public function show(LetterPrinting $letterPrinting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LetterPrinting  $letterPrinting
     * @return \Illuminate\Http\Response
     */
    public function edit(LetterPrinting $letterPrinting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLetterPrintingRequest  $request
     * @param  \App\Models\LetterPrinting  $letterPrinting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLetterPrintingRequest $request, LetterPrinting $letterPrinting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LetterPrinting  $letterPrinting
     * @return \Illuminate\Http\Response
     */
    public function destroy(LetterPrinting $letterPrinting)
    {
        //
    }
}
