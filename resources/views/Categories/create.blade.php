@extends('include.layoute')
@section('title',"Ajouter Categories")
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-success mt-4">Ajouter Categories </h2>
        <div class="card-body">
            <form  action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Catégories : <span class="text-danger">*</span></label> <input type="text" name="name" class="input input--style-3" value="{{old("name")}}" >
                     @if($errors->has('name'))
                     <span class="text-danger">{{ $errors->first('name') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name" class="mt-2">description :</label><br> <textarea name="description" id="" cols="30" rows="5"  class="textarea"></textarea>
                     @if($errors->has('description'))
                     <span class="text-danger">{{ $errors->first('description') }}</span><br>
                 @endif
                 </div>


                 <button type="submit" class="btn btn-success btn--radius">Ajouter</button>
                </form>
                </div>
              </div>

           


        @endsection
