@extends('include.layoute')
@section('title', "Ajouter produits")
@section("content")
<div class="container-fluid">

    <div class="card card-2">
        <h2 class="text-center text-capitalize text-success mt-4">Ajouter Produits </h2>
        <div class="card-body">
            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="stockes_id">Stock ID: <span class="text-danger">*</span></label>
                    <input type="text" name="stockes_id" class="input input--style-3" value="{{ old("stockes_id") }}">
                    @if($errors->has('stockes_id'))
                        <span class="text-danger">{{ $errors->first('stockes_id') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="numserie" class="mt-2">Numéro de Série:</label><br>
                    <input type="text" name="numserie" id="numserie" class="input input--style-3" value="{{ old("numserie") }}">
                    @if($errors->has('numserie'))
                        <span class="text-danger">{{ $errors->first('numserie') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="numinv" class="mt-2">Numéro d'Inventaire:</label><br>
                    <input type="text" name="numinv" id="numinv" class="input input--style-3" value="{{ old("numinv") }}">
                    @if($errors->has('numinv'))
                        <span class="text-danger">{{ $errors->first('numinv') }}</span><br>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Tribunal" class="mt-2">Tribunal:</label>
                    <input type="text" name="Tribunal" class="input input--style-3" value="{{ old("Tribunal") }}">
                    @if($errors->has('Tribunal'))
                        <span class="text-danger">{{ $errors->first('Tribunal') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="fondus" class="mt-2">Fondus:</label>
                    <input type="number" name="fondus" class="input input--style-3" value="{{ old("fondus") }}">
                    @if($errors->has('fondus'))
                        <span class="text-danger">{{ $errors->first('fondus') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nbr_maintenance" class="mt-2">Nombre de Maintenances:</label>
                    <input type="number" name="nbr_maintenance" class="input input--style-3" value="{{ old("nbr_maintenance") }}">
                    @if($errors->has('nbr_maintenance'))
                        <span class="text-danger">{{ $errors->first('nbr_maintenance') }}</span><br>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description" class="mt-2">Description:</label><br>
                    <textarea name="description" id="description" cols="30" rows="5" class="textarea">{{ old("description") }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span><br>
                    @endif
                </div>

                <button type="submit" class="btn btn-success btn--radius">Ajouter</button>
            </form>
        </div>
    </div>

</div>
@endsection
