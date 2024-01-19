@extends('Admin.master')
@section('title','Modifier Catégories')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('categories.update')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-warning">Modifier Categories </h1>
        <input type="hidden" value="{{$categories->id}}" name="id">
         <div class="form-group">
            name <input type="text" name="name" class="form-control" value="{{$categories->name}}" >
             @if($errors->has('name'))
             <span class="text-danger">{{ $errors->first('name') }}</span><br>
         @endif
         </div><br>

         <div class="form-group">
            description <textarea name="description" id="" cols="40" rows="2" >{{$categories->description}}</textarea>
             @if($errors->has('description'))
             <span class="text-danger">{{ $errors->first('description') }}</span><br>
         @endif
         </div><br>



     <button type="submit" class="btn btn-warning">Modifier</button>
   </form>
</div>
@endsection
