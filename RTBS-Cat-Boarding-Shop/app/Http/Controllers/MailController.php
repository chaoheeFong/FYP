<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index(){

            $data = [
                'subject' => 'Cat Status',
                'body' => 'Hello There'
            ];

            try {
                Mail::to('chaohee00@gmail.com')->send(new MailNotify($data));
                return response()->json(['Great check your mail box']);
            }
            catch(Exception $th){
                return response()->json(['Sorry something wrong']);
            }
    }
}
