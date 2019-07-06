<?php

namespace App\Http\Controllers\Admin;


use App\Models\Exam;
use App\Models\Subject;
use App\Models\Course;
use App\Models\centre;
use App\Models\Chapter;
use App\Models\Chapter_details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ChapterDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "";
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
        // $centres = centre::all();
        $chapters = Chapter::all();

        $sendData = array('subjects' => $subjects, 'courses' => $courses, 'chapters' => $chapters);
        return view('admin.ChapterDetails.create',$sendData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new Chapter_details();
        $data = array();
        foreach ($request->all() as $key => $value) {
            if ($key == "_token") {
                
            } elseif ($key == "details_img") {
                $photoname = time() . '.' . $request->details_img->getClientOriginalExtension();
                $request->details_img->move(public_path('course_photo'), $photoname);
                $db->details_img ="https://www.icajobguarantee.com/android/public/course_photo/". $photoname;
            } else {
                $db->$key = $value;
            }
        }
        if($db->save()) {
            return redirect()->action('Admin\ChapterDetailsController@index');
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter_details  $chapter_details
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter_details $chapter_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter_details  $chapter_details
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter_details $chapter_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter_details  $chapter_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter_details $chapter_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter_details  $chapter_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter_details $chapter_details)
    {
        //
    }
}
