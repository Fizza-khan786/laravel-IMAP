<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;
class ImapController extends Controller
{
    public function inbox(){
        $oClient = Client::account('default');
        $oClient->connect();

        $folder = $oClient->getFolder('INBOX');
        $messages = $folder->messages()->unseen()->get();
        dd($messages->total());
        
        return view('mailbox.inbox');
    }
}
