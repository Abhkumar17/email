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
        $user['to'] = 'abhi.bsi001@gmail.com';
        $user['cc'] = 'sumitkmr612@gmail.com';
        mail::send('sendDemoMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->to($user['cc']);
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

    public function emailsend(Request $request)
    {
       $emails = new User();
       print_r($emails);exit;
       $emails->to = $request->to;
       $emails->cc = $request->cc;
       $emails->bcc = $request->bcc;
       $emails->subject = $request->subject;
       $emails->save();
       return response()->json($emails, 200);
    }
}