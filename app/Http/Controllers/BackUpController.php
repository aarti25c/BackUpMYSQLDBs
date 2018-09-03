<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Artisan;
USE Session;
use Redirect;

class BackUpController extends Controller
{
    /**
     * Store Mysql Backup
     * @return text msg
     */
    public function store()
    {
        try {
        Artisan::call('backup:run',[]);
        $path = storage_path('app/DBbackup');
        $message = Artisan::output()."<br> <b>Copied to {$path} </b>";
        Session::flash('message', $message); 
        return redirect('/');
                   
        } catch (Exception $e) {

           throw new Exception("Error Processing Request", 1);
           
        }
    }
}
