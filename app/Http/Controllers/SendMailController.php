<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    
    public function index()
    {
        $data = ["name"=>"abhishek"];
        $user['to'] = 'jatin21112001@gmail.com';
        mail::send('sendDemoMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('hello');
        });
      
    }

    public function show()
    {
        return view('email_form');
    }

    public function autocomplete(Request $request)
    {
        $data = User::select("email as value", "id")
                    ->where('email', 'LIKE', $request->get('search'). '%')
                    ->get();

        return response()->json($data);
    }
}