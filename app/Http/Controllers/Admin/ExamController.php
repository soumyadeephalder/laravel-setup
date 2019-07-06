<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Course;
use App\Models\centre;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ExamController extends Controller
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
        $subjects = Subject::all();
        $courses = Course::all();
        $centres = centre::all();
        $chapters = Chapter::all();

        $sendData = array('subjects' => $subjects, 'courses' => $courses, 'centres' => $centres, 'chapters' => $chapters);
        return view('admin.exam.create',$sendData);
    }

    /*
        $table->string('exam_code');
        $table->string('ecam_name');
        $table->string('Course');
        $table->string('centre');
        $table->string('chapter');
        $table->string('subject');
        $table->string('status');
        $table->string('datet');
        $table->string('start_time');
        $table->string('end_time');

    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new Exam();
        $data = array();
        foreach ($request->all() as $key => $value) {
            if ($key != "_token") {
                $db->$key = $value;
            }
        }
        if($db->save()) {
            return redirect()->action('Admin\ExamController@index');
        } else {
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
