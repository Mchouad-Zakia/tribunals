@extends('include.layoute')
@section('title','Modifier Decharges')
@section("content")
<div class="container-fluid">


      <div class="card card-2">
        <h2 class=" text-center text-capitalize text-warning mt-4">Modifier Decharges </h2>
        <div class="card-body">
            <form action="{{route('Decharges.update')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <input type="hidden" value="{{$Decharges->id}}" name="id">
                <div class="form-group">
                    <label for="name">demandes_id :</label> <input type="number" name="demandes_id" class="input input--style-3" value="{{$Decharges->demandes_id}}" >
                     @if($errors->has('demandes_id'))
                     <span class="text-danger">{{ $errors->first('demandes_id') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="name">quantite_sortie :</label> <input type="number" name="quantite_sortie" class="input input--style-3" value="{{$Decharges->quantite_sortie}}" >
                     @if($errors->has('quantite_sortie'))
                     <span class="text-danger">{{ $errors->first('quantite_sortie') }}</span><br>
                 @endif
                 </div>

                 <div class="form-group">
                    <label for="date_sortie">date_sortie :</label> <input type="date" name="date_sortie" class="input input--style-3" value="{{$Decharges->date_sortie}}" >
                     @if($errors->has('date_sortie'))
                     <span class="text-danger">{{ $errors->first('date_sortie') }}</span><br>
                 @endif
                 </div>


                 <button type="submit" class="btn btn-warning btn--radius">Modifier</button>
                </form>
                </div>
              </div>




        @endsection
