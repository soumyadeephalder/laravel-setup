<?php

namespace App\Http\Controllers\Api;


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
        if (isset($request->type)) {
            return Chapter_details::where('chapter',  $request->chapter)->where('type',  $request->type)->get();
        } else {
            return Chapter_details::where('chapter',  $request->chapter)->get();
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
