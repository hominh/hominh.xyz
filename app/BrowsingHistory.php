<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowsingHistory extends Model
{

    protected $table = 'browsing_history';

    public static function createLog()
    {
        $browsingHistory = new BrowsingHistory();
        $browsingHistory->url = \Request::url();
        //$browsingHistory->session_id = \Request::getSession()->getId();
        $browsingHistory->user_id = 0;
        $browsingHistory->ip = \Request::getClientIp();
        $browsingHistory->agent = \Request::header('User-Agent');
        $browsingHistory->save();
    }
}
