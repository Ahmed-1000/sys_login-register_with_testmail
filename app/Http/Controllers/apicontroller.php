<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;

class apicontroller extends Controller
{
    function showdata(){
        $data = Admin::get();
        
        return $data;
        
    }
}
