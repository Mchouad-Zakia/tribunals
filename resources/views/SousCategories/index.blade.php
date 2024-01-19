@extends('include.layoute')
@section('title','sous_categories')
@section('content')
<div class="container-fluid">



    <br>
    @if (session('status'))
    <div class="alert alert-success auto-close-alert">
        {{ session('status') }}
    </div>

    <script>
        setTimeout(function() {
            document.querySelector('.auto-close-alert').style.display ='none';
        }, 2000);
    </script>
@endif
<div class="card shadow mb-4">


<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h2 class="m-0 font-weight-bold text-primary">Liste sous_Catégories</h2>
    <div class="d-flex align-items-center">
        <input type="text" id="searchInput" class="form-control mr-2" placeholder="Rechercher">
        <a href="{{ route('sous_categories.create') }}" class="btn btn-primary ml-2"><i class="fa fa-plus"></i>Ajouter sous_Catégories</a>

    </div>
</div>


    <div class="card-body">
        <div class="table-responsive  text-dark">
            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center searchable-element">
                        <th>name</th>
                        <th>description</th>
                        <th>categories</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody >
                 @foreach ($data as $item )
                   <tr class="text-center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->category->name}}</td>
                    <td><a href="{{route('sous_categories.edit',$item->id)}}" class="btn text-warning"><i class='fas fa-pencil-alt'></i></a>
                        <a href="{{route('sous_categories.destroy',$item->id)}}" class="btn  text-danger" onclick="return confirm('Voulez-vous supprimer ?')"><i class="fa fa-trash" aria-hidden="true" ></i></a></td>
                   </tr>

                   @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection
