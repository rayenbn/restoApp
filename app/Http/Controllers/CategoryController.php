<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Category;
use App\Http\Resources\Category as CategoryResource;


class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(["index", "create", "store", "edit", "update", "search", "destroy"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
        ->select('categories.id', 'categories.category_name', 'categories.order')
        ->paginate(5);
        return view('system-mgmt/category/index', ['categories' => $categories]);
        // Get categories
       // $categories = Category::paginate(15);
        // return collection of categories as a resource
       // return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $request->isMethod('put') ? Category::findOrFail($request->category_id) : new Category;
        $category->id = $request->input('category_id');
        $category->category_name = $request->input('category_name');
        $category->order = $request->input('order');

        if($category->save()){
            return new CategoryResource($category);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get category
        $category = Category::findOrFail($id);
        // return the category as resource
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get category
        $category = Category::findOrFail($id);
        
        if($category->delete()){
            return new CategoryResource($category);
        }
    }


    public function loadCategory() {
        // Get categories
        $categories = Category::paginate(15);
        // return collection of categories as a resource
        return CategoryResource::collection($categories);
    }
}
