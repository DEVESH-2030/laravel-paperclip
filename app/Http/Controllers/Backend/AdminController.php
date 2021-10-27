<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * constructor 
     */
    function __construct()
    {
        $this->view = '.backend.';
    }
    public function dashboard()
    {
        $users = User::all();
        return view($this->view . 'dashboard', compact('users'));
    }
    
}
