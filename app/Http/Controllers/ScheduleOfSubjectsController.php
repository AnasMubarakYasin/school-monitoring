<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleOfSubjectsRequest;
use App\Http\Requests\UpdateScheduleOfSubjectsRequest;
use App\Models\ScheduleOfSubjects;

class ScheduleOfSubjectsController extends Controller
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
     * @param  \App\Http\Requests\StoreScheduleOfSubjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScheduleOfSubjectsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleOfSubjects  $scheduleOfSubjects
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduleOfSubjects $scheduleOfSubjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleOfSubjects  $scheduleOfSubjects
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduleOfSubjects $scheduleOfSubjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleOfSubjectsRequest  $request
     * @param  \App\Models\ScheduleOfSubjects  $scheduleOfSubjects
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleOfSubjectsRequest $request, ScheduleOfSubjects $scheduleOfSubjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleOfSubjects  $scheduleOfSubjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduleOfSubjects $scheduleOfSubjects)
    {
        //
    }
}
