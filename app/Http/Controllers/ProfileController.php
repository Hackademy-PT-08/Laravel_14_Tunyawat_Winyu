<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('users.profile');
    }

    public function articles(){

        $current_user_id = auth()->user()->id;
        $user_articles = User::find($current_user_id)->profile;
        
        return view('users.profile', [
            'user_articles' => $user_articles
        ]);
    }
}
