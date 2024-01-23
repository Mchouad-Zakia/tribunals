@extends('include.layoute')
@section('title', "Ajouter bureau")
@section("content")
    <div class="container-fluid">
        <div class="card card-2">
            <h2 class="text-center text-capitalize text-success m-3">Ajouter bureau</h2>
            <div class="card-body">
                <form action="{{ route('Bureau.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Nom Bureau </label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}"
                                placeholder="Enter nome bureau ">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span><br>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="typeB">Type Bureau </label>
                            <input type="text" name="typeB" class="form-control" value="{{ old('typeB') }}"
                                placeholder="Enter type de bureau ">
                            @error('typeB')
                                <span class="text-danger">{{ $message }}</span><br>
                            @enderror
                        </div>

                    </div><br><br>

                    <div class="form-group">
                        <label for="user" class="m-2">Utilisateur</label>
                        <select name="user" id="user" class="form-select">
                            <option value="">Select utilisateur</option>
                            @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}</option>
                            @endforeach
                        </select>
                        @error('user')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn--radius">Ajouter Bureau</button>
                </form>
            </div>
        </div>
    </div>
@endsection
