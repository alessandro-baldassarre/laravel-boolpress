<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index(){
        return view('guest.contacts');
    }

    public function sendRequest(Request $request){

        Mail::to("admin@test.it")->send(new SendNewMail($request->senderName, $request->senderEmail, $request->senderMessage));

        return redirect('/')
        ->with('message', "Grazie $request->senderName!!Il messaggio è stato inviato correttamente");
    }

}
