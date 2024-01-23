@extends('include.layoute')
@section('title','sous_categories')
@section('content')
@include("include.confirmDeleteModal")
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
   <div><h2  class="m-0 font-weight-bold">Liste sous_Catégories</h2></div>
     <div>
       <a href="{{ route('sous_categories.create') }}" id="ajouter" class="btn"><i class="fa fa-plus"></i></a>
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
                   <tr class="text-center searchable-element">
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->category->name}}</td>stock
                    <td><a href="{{route('sous_categories.edit',$item->id)}}" class="btn text-warning"><i class='fas fa-pencil-alt'></i></a>
                        <a href="#" class="btn delete-btn " data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $item->id }}" class="btn  text-danger" ><i class="fa fa-trash" aria-hidden="true" ></i></a></td>
                   </tr>

                   @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
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
               url: '{{ route("sous_categories.destroy", "") }}/' + deleteId,
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
