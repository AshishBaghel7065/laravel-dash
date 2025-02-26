<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\Userdetails;
use App\Mail\ForgotPasswordMail;

class MailController
{
    
    public function  sendUserDetails ($name, $email, $phone, $message, $date_of_appointment){
        $details = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'user_message' => $message,
            'date_of_appointment' => $date_of_appointment,
        ];

    Mail::to('ashishkumar440385@gmail.com')->send(new Userdetails($details));

    return "Email Sent!";

}

  
}

