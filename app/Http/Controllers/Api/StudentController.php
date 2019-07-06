<?php

namespace App\Http\Controllers\Api;

use Mail;
use App\Models\Student;
use App\Models\StdCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Student::get();

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
        $data = array();
        $valtEmail = Student::where('email', $request->email)->count();
        $valtMobile = Student::where('mobile', $request->mobile)->count();

        if ($valtEmail > 0) {
            $data['status'] = false;
            $data['efor'] = "email";
            $data['error'] = "Email id exists";
        } elseif ($valtMobile > 0) { 
            $data['status'] = false;
            $data['efor'] = "mobile";
            $data['error'] = "Mobile no. exists";
        } else {
    

           $db = new Student();
           
           $db->code = "ICA-A-".time();
           foreach ($request->all() as $key => $value) {
               $db->$key = $value;
           }
           $db->otp = "0";
           if($db->save()) {
            $data['status'] = true;

            $data['data'] = $db;
            $data['error'] = 0;
            $data['efor'] = 0;


                Mail::send('email.registration',  
                array(
                    'name'          => $db->name,
                    'email'         => $db->email,
                    'mobile'        => $db->mobile,
                    'code'          => $db->code
                ), function($message) use ($db) {
                      // $message->attach($pathToFile);
                     $message->to($db->email, $db->name)->subject('ICA Registration !');
                      $message->from('verification@icajobguarantee.com', 'ICA');
                });



           } else {
            $data['status'] = false;
            $data['error'] = "Server busy try agen leter";
            $data['efor'] = 0;
           }

       }
        return $data;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function login(Request $request){
        $db = Student::where('code', $request->code)->get();

        $data = [];

        if (count($db)) {
            if ($request->resend) {
                $data['status'] = true;
                $data['otp'] = $db[0]->otp;
                $data['code'] = $db[0]->code;
                $data['error'] = "OTP resend successfully, please check your email ";
            } else {
                $db_update = Student::find($db[0]->id);
                $data['status'] = true;
                $data['otp'] = rand(100000,999999);
                $data['code'] = $db[0]->code;
                $db_update->otp = $data['otp'];
                $data['error'] = 0;
                $db_update->save();
            }

            $data['mobile'] = $db[0]->mobile;
            $email_send = Mail::send('email.send_otp',  
            array(
                'name'          => $db[0]->name,
                'email'         => $db[0]->email,
                'mobile'        => $db[0]->mobile,
                'otp'           => $data['otp']
            ), function($message) use ($db) {
                  // $message->attach($pathToFile);
                 $message->to($db[0]->email, $db[0]->name)->subject('ICA login verification !');
                  $message->from('verification@icajobguarantee.com', 'ICA');
            });

            if ($email_send == false) {
                 // $data['status'] = false;
                 // $data['error'] = "Some internal error occurred, please try again later";
            }

        } else {
            $data['status'] = false;
            if ($request->resend) {
                $data['error'] = "Some internal error occurred, please try again later";
            } else {
                $data['error'] = "This student code invalid";
            }
            
           
        }

       
        
        
        return $data;
        
    }
    public function otpVerification(Request $request)
    {
        $db = Student::where('code', $request->code)->where('otp', $request->otp)->get();
        $data = [];
        if (count($db)) {
             $data['status'] = true;
             
             $db_update = Student::find($db[0]->id);
             $db_update->otp = 0;
             $db_update->save();
             $data['data'] = $db_update;
             $data['error'] = 0;
             $data['course'] = StdCourse::where('student', $db[0]->id)->count();
        } else {
            $data['status'] = false;
            $data['error'] = "This OTP invalid";
        }
        return $data;
    }
}
