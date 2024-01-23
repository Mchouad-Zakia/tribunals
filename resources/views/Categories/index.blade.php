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
            <div>
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="m-0 font-weight-bold">Liste Catégories</h2>
                    </div>
                    <div>
                        <a href="{{ route('categories.create') }}" id="ajouter" class="btn "><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                @if(count($Categories) > 0)
                    <div class="ml-3 mr-3 mt-3">
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
                                                <a href="#" class="btn  delete-btn {{$Categorie->sous_categories->count()>0 ? ' text-secondary disabled' : "text-danger"}}" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{  $Categorie->id}}"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <p class="ml-3 mr-3 mt-3">Aucune catégorie disponible.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- lengthChange: false,  searching: false, -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
           var deleteId;

           // Gérer l'événement d'ouverture de la boîte de dialogue modale
           $('.delete-btn').on('click', function() {
               deleteId = $(this).data('id');
               console.log(deleteId)// Stocker l'ID de l'élément à supprimer
           });

           // Gérer l'événement de clic sur le bouton de confirmation
           $('#confirmDeleteBtn').on('click', function() {
               // Vous pouvez ici effectuer une requête AJAX pour supprimer l'élément
               $.ajax({
                   url: '{{ route("categories.destroy", "") }}/' + deleteId,
                   type: 'get',
                   success: function(response) {
                       // Traiter la réponse ou rediriger si nécessaire
                       window.location.reload(); // Par exemple, rechargez la page après la suppression
                   },
                   error: function(error) {
                       // Gérer les erreurs de la requête AJAX
                       console.error(error);
                   }
               });

               // Fermer la boîte de dialogue modale après la suppression
               $('#confirmDeleteModal').modal('hide');
           });
       });
   </script>
@endsection
