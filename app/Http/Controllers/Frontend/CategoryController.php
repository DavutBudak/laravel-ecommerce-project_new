<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Category $category)
    {

           $allCategories = Category::all()->where("is_active",true);


        return view("frontend.home.index" , ["categories" =>$allCategories , "products" =>  $category->products]);
    }
}
