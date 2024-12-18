<?php

namespace App\Http\Controllers;

use App\Mail\EhwMail;
use App\Mail\RequestMail;
use App\Mail\ScheduleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function request(){
        // Mail::to("jabbarpanggabean@gmail.com")->send(new RequestMail());
        Mail::to("rifa.salsabila@unilever.com")->send(new RequestMail());

        return redirect('/dashboard')->with('success', 'Request pengangkutan LB3 berhasil diperbaharui!');
    }

    public function schedule(){
        // Mail::to("jabbarpanggabean@gmail.com")->send(new ScheduleMail());
        Mail::to("rifa.salsabila@unilever.com")->send(new ScheduleMail());

        return redirect('/dashboard')->with('success', 'Request pengangkutan LB3 berhasil diperbaharui!');
    }
}
