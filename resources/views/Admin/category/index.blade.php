@extends('layout.dashbord')
@section('title','CategoriesList')



@section('content')

    
  <div class="container">

    @if(session()->has('success'))

<div class="alert alert-success">
{{session()->get('success')}}
</div>
@endif

<div class="table-toolbar mb-3">
<a href="{{ route('Admin.category.create')}} " class="btn btn-info">create</a>

</div>


<form action="{{ route('Admin.category.index')}}" method="get" class="d-flex mb-4">
<input type="text" name="name" class="form-control me-2" placeholder="search by name">
<select name="parent_id" class="form-control me-2">
<option value="">All</option>
@foreach($perents as $perent) 
    <option value=" {{$perent->id}}">{{$perent->name}}</option>
   @endforeach 
</select>
<button type="submit" class="btn btn-secondary">Filter</button>
</form>


    <table class="table">
<thead >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Parent ID</th>
        <th>Created At</th>
        <th>Atatus</th>
        <th></th>
    </tr>
</thead>

<tbody>
@foreach($categories as $category)
<tr>
<td> {{$category->id}}</td>
<td> <a href="{{ route('Admin.category.Edit',[$category->id])}}">   {{$category->name}} </a>  </td>
<td>{{$category->parent_name}}</td>
<td>{{$category->created_at}}</td>
<td>{{$category->status}}</td>
<td>
<form action="{{ route('Admin.category.destroy',[$category->id])}}" method="post">
@csrf
@method('delete')
    
    <button type="submit" class="btn btn-sm btn-danger">delete</button>

</form>
</td>
</tr>
@endforeach
</tbody>
    </table> </div>
    @endsection
   