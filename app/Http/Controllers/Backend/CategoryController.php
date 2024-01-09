<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
            $this->returnUrl = "/categories";
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories=Category::all();
        return view("backend.categories.index" ,["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("backend.categories.insert_form");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {

      /*  $name = $request->get("name");
                $email = $request->get("email");
                 $password = $request->get("password");
                $is_admin = $request->get("is_admin",0);
                $is_active = $request->get("is_active",0);

        */

        $category = new Category();

 /*
$category->name = $name;
$category->email = $email;
$category->password = Hash::make($password);
$category->is_active = $is_active;
$category->is_admin = $is_admin;
  */

$data = $this->prepare($request,$category->getFillable());
$category->fill($data);
$category->save();

    return Redirect::to($this->returnUrl);



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view("backend.categories.update_form", ["category" =>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
          /*  $name = $request->get("name");
                $email = $request->get("email");
                $is_admin = $request->get("is_admin",0);
                $is_active = $request->get("is_active",0);


$category->name = $name;
$category->email = $email;
$category->is_active = $is_active;
$category->is_admin = $is_admin;
          */


$data = $this->prepare($request,$category->getFillable());
$category->fill($data);


$category->save();
    return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {

         $category->delete();
        // return Redirect::to("/categories");

        return response()->json(["message" => "Done" , "id" => $category->category_id]);

    }




}
