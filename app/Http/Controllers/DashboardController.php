<?php

namespace App\Http\Controllers;

use App\Livewire\Admin\Users\Index;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
       return view ('admin.index');
    }
}
