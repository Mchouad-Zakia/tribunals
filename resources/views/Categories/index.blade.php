@extends('include.layoute')
@section('title', 'categories')
@section('content')
    <div class="container-fluid">
        <br>
        @if (session('status'))
            <div class="alert alert-success auto-close-alert">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.auto-close-alert').style.display = 'none';
                }, 2000);
            </script>
        @endif
        <div class="card shadow mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="m-0 font-weight-bold">Liste Catégories</h2>
                    </div>
                    <div class="d-flex align-items-center" id="RECHERCHE">
                        <div class="form-group">
                            <input type="text" class="form-control bg-light border-0 small" id="searchInput"
                                placeholder="Recherche" aria-label="Search" aria-describedby="basic-addon2">

                        </div>
                        <div class="input-group-append">
                            <button class="btn" id="search" type="button">
                                <i class="fas fa-search fa-sm text-light"></i>
                            </button>
                        </div>
                        &nbsp;&nbsp;
                        <a href="{{ route('categories.create') }}" id="ajouter" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            <div class="card-body">
                <div class="table-responsive text-dark">
                    <table class="table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>name</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Categories as $Categorie)
                                <tr class="text-center searchable-element">
                                    <td>{{ $Categorie->name }}</td>
                                    <td>{{ $Categorie->description }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $Categorie->id) }}" class="btn text-warning"><i
                                                class='fas fa-pencil-alt'></i></a>
                                        <a href="{{ route('categories.destroy', $Categorie->id) }}" class="btn text-danger"
                                            onclick="return confirm('Voulez-vous supprimer ?')"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery, Bootstrap DataTables CSS and JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
