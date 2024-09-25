<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller{
//======================Start======================//
public function sendEmail(){
    $messageContent = "This is the email body content.";
    $subjectLine = "Custom Email Subject";

    // Sending the email
    Mail::to('churendrakameshwar@gmail.com')->send(new CustomMail($messageContent, $subjectLine));

    return "Email Sent!";
}


//=======================End======================//
}
