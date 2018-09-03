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
     * Delete Ytel group List validation
     * @param object Request
     * @param  int x5_contact_id
     * @return json
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
