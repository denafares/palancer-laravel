<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;

class CategoryController extends Controller
{

   public function index(Request $request)
  {
    $categories=category::when($request->name,function($query,$value)
    {
        $query->where(function($query) use ($value)
        {
        $query->where('name','like',"%{$value}%")
       ->orwhere('description','like',"%{$value}%");
});
    })
    ->when($request->parent_id , function($query,$value)
    {
       
    $query->where('parent_id','=',$value);
    })->LeftJoin('categories as parents','parents.id','=','categories.parent_id')
    ->select([
        'categories.*',
        'parents.name as parent_name'
    ])
    ->get();


   /* $query=category::query();
    if($request->name){
        $query->where(function($query) use ($request){
        $query->where('name','like',"%{$request->name}%")
        ->orwhere('description','like',"%{$request->name}%");});
    }
    if($request->parent_id){
        $query->where('parent_id','=',$request->parent_id);
    }
    $categories=$query->get();*/
       // $categories=category::all();
        $perent=category::orderBy('name','asc')->get();
        return view(route('Admin.category.index'),['categories'=>$categories ,'perents'=>$perent,]);
  }

    public function create()
    {
     

        $perent=category::orderBy('name','asc')->get();
        return view('Admin.category.create')->with('perents',$perent)
        ->with('title','Add category');
    }
    public function store(Request $request)
    {
        $category=new category();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->input('description');
        $category->parent_id=$request->post('perent_id');
        $category->status=$request->post('status');
        $category->save();
        return redirect('/Admin/category/create')->with('success','category add');
    }


    public function Edit($id)
   {
      /* $category=category::where('id','=',$id)->first();
*/
     //  or
      $category=category::findorFail($id);
    //بدل هاي ممكن احط جنب الفايند او فيل 
     /* if($category==null)
      {
          abort(404);
      }*/
    $perent=category::where('id','<>',$id)->orderBy('name','asc')->get();
       return view('/Admin/category/Edit',['id'=>$id,'perents'=>$perent,'category'=>$category]);

   }

   public function update(Request $request , $id)
   {
    $category=category::find($id);
if($category==null)
{
    abort(404);
}
    $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->description=$request->input('description');
        $category->parent_id=$request->post('perent_id');
        $category->status=$request->post('status');
        $category->save();
        return redirect()
        ->route('Admin.category.index')
        ->with('success','category update');


   }

   public function show($id)
   {
       return __METHOD__;
       return view('Admin.category.show',[
           'category'=>category::findorFail($id),
       ]
       
   );
   }

   public function destroy($id)
   {
       //method1
    /*   $category=category::find($id);
       $category->delete();*/

       //method2
      // category::where('id','=',$id)->delete();

       //method3
       category::destroy($id);
       return redirect()
       ->route('Admin.category.index')
       ->with('success','category deleted');

   }



}
