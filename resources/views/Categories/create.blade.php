@extends('Admin.master')
@section('title','Ajouter Catégories')

@section('content')
<div class="container">

    <form class="form-inline custom-form" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
     @csrf

     <h1 class="text-center text-success">Ajouter Categories </h1>

         <div class="form-group">
            name <input type="text" name="name" class="form-control " value="{{old("name")}}" >
             @if($errors->has('name'))
             <span class="text-danger">{{ $errors->first('name') }}</span><br>
         @endif
         </div>

         <div class="form-group">
            description <textarea name="description" id="" cols="30" rows="2"></textarea>
             @if($errors->has('description'))
             <span class="text-danger">{{ $errors->first('description') }}</span><br>
         @endif
         </div>



     <button type="submit" class="btn btn-success">Ajouter</button>
   </form>
</div>
@endsection
