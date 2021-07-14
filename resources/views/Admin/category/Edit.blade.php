@extends('layout.dashbord')
@section('title','Edit Category')
@section('content')
<div class="container">
   

   @if(session()->has('success'))

<div class="alert alert-success">
{{session()->get('success')}}
</div>
@endif

    <form action="{{ route('Admin.category.update', $id }}" method="post" enctype="multipart/form-data">
    
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf
   @method('put')
   
    
   
    <div class="form-group mb-3">
   <label for="">Name: </label>
   <input type="text" name="name" value="{{$category->name}}" class="form-control">
    </div>


    <div class="form-group">
   <label for="" >perent id: </label>
   <select name="perent_id" class="form-control"> 
   <option value="" >No perent</option>
   @foreach($perents as $perent) 
    <option value=" {{$perent->id}}" @if($perent->id == $category->parent_id)  selected @endif  >{{$perent->name}}</option>
    @endforeach 
    

   </select>
    </div>


    <div class="form-group">
   <label for="">description: </label>
   <textarea name="description" class="form-control">{{$category->description}}</textarea>
    </div>

    <div class="form-group">
   <label for="">Image: </label>
   <input type="file" name="image" class="form-control">
    </div>
    
    <div class="form-group">
   <label for="">status: </label>
  <div>
  <label> <input type="radio" name="status" value="active" @if($category->status=='active') checked @endif  >
Active </label>

<label> <input type="radio" name="status" value="inactive" @if($category->status=='inactive') checked @endif >
InActive </label>
</div>

    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary">update</button>
    </div>
     </form>
     </div>
@endsection