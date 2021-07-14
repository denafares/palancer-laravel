@extends('layout.dashbord')
@section('title','create Category')
@section('content')
<div class="container">
   

    <?php if(session()->has('success')):?>

<div class="alert alert-success">
<?=session()->get('success')?>
</div>

<?php endif?>
    <form action="{{ route('Admin.category.store')}}" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}  ">
    <div class="form-group mb-3">
   <label for="">Name: </label>
   <input type="text" name="name" class="form-control">
    </div>


    <div class="form-group">
   <label for="" >perent id: </label>
   <select name="perent_id" class="form-control"> 
   <option value="" >No perent</option>
   @foreach($perents as $perent) 
    <option value=" {{$perent->id}}">{{$perent->name}}</option>
    @endforeach 
    

   </select>
    </div>


    <div class="form-group">
   <label for="">description: </label>
   <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
   <label for="">Image: </label>
   <input type="file" name="image" class="form-control">
    </div>
    
    <div class="form-group">
   <label for="">status: </label>
  <div>
  <label> <input type="radio" name="status" value="active" >
Active </label>

<label> <input type="radio" name="status" value="inactive" >
InActive </label>
</div>

    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary">Add</button>
    </div>
     </form>
     </div>
@endsection