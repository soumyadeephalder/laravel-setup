<?php

namespace App\Http\Controllers\Api;
// use Carbon;
use App\Models\StdCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StdCourseController extends Controller
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
        // $db = new StdCourse();
        $request->student;
        $data_array = array();
        $course = explode(',',$request->course);
        $data_sub = array();
        $now = date('Y-m-d H:i:s');
        foreach ($course as $value) {
            $data_sub = array("course"=>$value, "student" =>$request->student, "updated_at"=>$now, "created_at"=>$now);
            // array_push($data_sub,  $data_array);
           $data_array[]=$data_sub;
               
        }
        // return $data_array;
        // if ($db->save()) {
        if (StdCourse::insert($data_array)) {
            $data['status'] = true;
            $data['error'] = 0;
        } else {
            $data['status'] = false;
            $data['error'] = "Server busy try agen leter";
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StdCourse  $stdCourse
     * @return \Illuminate\Http\Response
     */
    public function show(StdCourse $stdCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StdCourse  $stdCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(StdCourse $stdCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StdCourse  $stdCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StdCourse $stdCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StdCourse  $stdCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(StdCourse $stdCourse)
    {
        //
    }
}
