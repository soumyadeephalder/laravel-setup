<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\centre;
use App\Course;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $endpoint = "https://new.icaerp.com/api/data/centrelistfortutorial";
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('POST', $endpoint, ['query' => [
        //     'authtoken' => "tut2019June", 
        //     'source' => 'TutorialApp'
        // ]]);


        $post = [
            'authtoken' => 'tut2019June',
            'source' => 'TutorialApp',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        $response = json_decode($response);
        $db_arry = array();
        foreach ($response as $value) {
            $db = new centre();
            $db->Center_code = $value->Center_code;
            $db->Center_name = $value->Center_name;
            $db->Center_address = $value->Center_address;
            $db->cityName = $value->cityName;
            $db->stateName = $value->stateName;
            $db->Center_pin = $value->Center_pin;
            $db->Active_flag = $value->Active_flag;
            $db->OPERATION = $value->OPERATION;
            $db->save();

            array_push($db_arry, $value);
            
        }
        return json_encode($db_arry);

        // $data = centre::all();
        // $centres = array('centres' => $data);
        // return view('admin.centre.index', $centres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // centres_name
    // course_name
    // course_id
    public function create()
    {
        $data = Course::all();
        $courses = array('courses' => $data);
         return view('admin.centre.create',  $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

        // $db = new centre();
        // $course_name =array();
        // $db->centres_name = $request->centres_name;
        // $db->course_id = implode(" => ",$request->course_id);
        // foreach($request->course_id as $value){
        //     $course_data = Course::find($value);
        //     array_push($course_name,$course_data->course_name);
        // }

        // $db->course_name = implode(" => ",$course_name);
        // // return json_encode( $db );
        // $db->save();
        return redirect()->action('Admin\CentreController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(centre $centre)
    {
        
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
