@extends('include.layoute')
@section('title', 'categories')
@section('content')
@include('include.confirmDeleteModal')
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
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="m-0 font-weight-bold text-primary">Liste Catégories</h2>
                </div>
                <div class="d-flex align-items-center">
                    <input type="text" id="searchInput" class="form-control mr-2" placeholder="Rechercher">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter Catégories</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-dark">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                        <a href="{{ route('categories.destroy', $Categorie->id) }}"
                                            class="btn text-danger"
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    function searchElements(query) {
    // Convertit la requête en minuscules pour ignorer la casse
    query = query.toLowerCase();

    // Parcours tous les éléments à rechercher
    $('.searchable-element').each(function() {
      var text = $(this).text().toLowerCase();

      // Si le texte de l'élément contient la requête, affiche l'élément
      if (text.indexOf(query) !== -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }

      $('#searchInput').on('input', function() {
    var query = $(this).val();
    searchElements(query);
  });

</script>
@endsection
