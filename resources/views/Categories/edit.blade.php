@extends('include.layoute')
@section('title','Modifier Catégories')
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-warning mt-4">Modifier Categories </h2>
        <div class="card-body">
            <form action="{{route('categories.update')}}" method="POST" enctype="multipart/form-data">                @csrf
                <input type="hidden" value="{{$categories->id}}" name="id">
                <div class="form-group">
                    <label for="name">Catégories :</label> <input type="text" name="name" class="input input--style-3" value="{{$categories->name}}" >
                     @if($errors->has('name'))
                     <span class="text-danger">{{ $errors->first('name') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name" class="mt-2">description :</label><br> <textarea name="description" id="" cols="30" rows="5"  class="textarea">{{$categories->description}}</textarea>
                     @if($errors->has('description'))
                     <span class="text-danger">{{ $errors->first('description') }}</span><br>
                 @endif
                 </div>


                 <button type="submit" class="btn btn-warning btn--radius">Modifier</button>
                </form>
                </div>
              </div>




        @endsection
