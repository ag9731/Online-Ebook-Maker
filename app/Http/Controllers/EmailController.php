<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function index()
    {
        return view('email');
    }
    public function send(Request $request)
    {
        $data = [
            'nama' =>$request->nama,
            'image' =>$request->file('image')

        ];
        $to = 'bcar184042@gmail.com';
        \Mail::to($to)->send(new \App\Mail\TesMail($data));
        echo 'sent email to admin';


    }


}
