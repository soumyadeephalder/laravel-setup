<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Course;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subject::all();
        $courses = Course::all();
        $sendData = array('subjects' => $data,'courses' => $courses);
        return view('admin.subject.index', $sendData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $sendData = array('courses' => $courses);
        return view('admin.subject.create',$sendData);
    }

    /*
        $table->string('subject_code');
        $table->string('subject_name');
        $table->string('course_id');
        $table->string('status');
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $db = new Subject();
        // $db->subject_code = $request->subject_code;
        // $db->subject_name = $request->subject_name;
        // $db->course_id = $request->course_id;
        // $db->status = $request->status;
        // $db->save();
        // return redirect()->action('Admin\SubjectController@index');

        return Subject::where('course_id', $request->course_id)->where('status', "1")->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject)
    {
        $db = Subject::find($subject);
        $db->delete();
        return redirect()->action('Admin\SubjectController@index');
    }
}
