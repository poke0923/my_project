<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller {
    public function index( Request $request ){
        //$insertResult = DB::connection('mysql')->insert("insert into users (ID, email, name, password) values (1,'a','b','pass1'),(2,'c','d','pass2'),(3,'e','f','pass3')" );
        
        $deleteResult = DB::connection('mysql')->delete("delete from users where email = 'a'");
        dd($deleteResult);
        
        
    }
}
