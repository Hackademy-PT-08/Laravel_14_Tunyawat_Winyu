<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show($id){

        $categories = Categories::find($id);

        return view();
    }
}
