<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail(Request $request){
        $message = $request->message;
        Mail::to($request->email)->send(new SendMail($message));

        return "mail has been sent succesfully";
    }
}
