<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function index(){
   $user = Auth::user();
   return view('auth/profile/index')->withUser($user);
   }

   public function edit(){
   return view('auth/profile/index');
   }

}
