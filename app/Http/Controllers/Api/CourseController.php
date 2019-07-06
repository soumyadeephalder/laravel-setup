<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\StdCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Course::all();
        $courses = array('courses' => $data);
        return view('admin.courses.index', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $course  = Course::get();
       $data_Course = array();
       foreach ($course as $value) {
        $stdcors = StdCourse::where('student', $request->student)->where('course', $value->id)->count();
          // if (is_object($stdcors)) {
             $value->status = $stdcors;
          // } else {
          //   $value->status =  count($stdcors);
          // }
          array_push($data_Course, $value);
       }
       return $data_Course;
       // if ($request->student) {
       //      $data_Course = array();
       //      $db_chack = StdCourse::where('student', $request->student)->get();
       //      foreach ($db_chack as $valueStdCous) {
       //          $teme_data = Course::where('id', $valueStdCous->course)->get()->first();
       //          if (is_object($teme_data)) {
       //             array_push($data_Course, $teme_data);
       //          }
                
       //      }
       //     return $data_Course;
       // } else {

       //      return Course::get();
       // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        $db = Course::find($course);
        $db->delete();
        // return json_encode($db);
        return redirect()->action('Admin\CourseController@index');
    }

    public function subject($value='')
    {
        
    }
}
