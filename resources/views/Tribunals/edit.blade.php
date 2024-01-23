@extends('include.layoute')
@section('title',"Modifier Tribuna")
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-warning mt-4">Modifier Tribuna </h2>
        <div class="card-body">
            <form  action="{{route('tribunal.update')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{$data->id}}" name="id">
                @csrf
                <div class="form-group">
                    nom&nbsp;  &nbsp;&nbsp;<input type="text" name="nom" class="input input--style-3" value="{{$data->nom}}" placeholder="" ><br>
                    @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span><br>
                @endif
                 </div>

                 <div class="form-group">
                    Type &nbsp;  &nbsp;&nbsp;<input type="text" name="type" class="input input--style-3 " value="{{$data->type}}" ><br>
                     @if($errors->has('type'))
                     <span class="text-danger">{{ $errors->first('type') }}</span><br>
                 @endif
                 </div>
                 <div class="form-group">
                Adresse&nbsp;  &nbsp;&nbsp;<input type="text" name="adresse" class="input input--style-3 " value="{{$data->adresse}}" ><br>
                     @if($errors->has('adresse'))
                     <span class="text-danger">{{ $errors->first('adresse') }}</span><br>
                 @endif
                 </div>


                 <button type="submit" class="btn btn-warning">Modifier</button>
                </form>
                </div>
              </div>




        @endsection
