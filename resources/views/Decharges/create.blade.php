@extends('include.layoute')
@section('title', "Ajouter Decharges")
@section("content")
<div class="container-fluid">

    <div class="card card-2">
        <h2 class="text-center text-capitalize text-success mt-4">Ajouter Decharges </h2>
        <div class="card-body">
            <form action="{{ route('Decharges.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="stockes_id">demandes_id: <span class="text-danger">*</span></label>
                    <input type="number" name="demandes_id" class="input input--style-3" value="{{ old("demandes_id") }}">
                    @if($errors->has('demandes_id'))
                        <span class="text-danger">{{ $errors->first('demandes_id') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="quantite_sortie" class="mt-2">quantite_sortie:</label><br>
                    <input type="number" name="quantite_sortie" id="quantite_sortie" class="input input--style-3" value="{{ old("quantite_sortie") }}">
                    @if($errors->has('quantite_sortie'))
                        <span class="text-danger">{{ $errors->first('quantite_sortie') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date_sortie" class="mt-2">date_sortie:</label><br>
                    <input type="date" name="date_sortie" id="date_sortie" class="input input--style-3" value="{{ old("date_sortie") }}">
                    @if($errors->has('date_sortie'))
                        <span class="text-danger">{{ $errors->first('date_sortie') }}</span><br>
                    @endif
                </div>


                <button type="submit" class="btn btn-success btn--radius">Ajouter</button>
            </form>
        </div>
    </div>

</div>
@endsection
