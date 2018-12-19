<?php


namespace App\Helpers;
use Request;
use App\Session as SessionModel;


class KeepSession
{


    public static function addToSession($subject)
    {
        $session = [];
        $session['payload'] = $subject;
        $session['last_activity'] = Request::fullUrl() . '-' . Request::method(); 
        $session['ip_address'] = Request::ip();
        $session['user_agent'] = Request::header('user-agent');
        $session['user_id'] = auth()->check() ? auth()->user()->id : 1;
        SessionModel::create($session);
    }


    public static function SessionModelLists()
    {
        return SessionModel::latest()->get();
    }


}