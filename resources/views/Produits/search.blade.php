@extends('include.layoute')
@section('title', 'Recherche')
@section('content')
@include('include.confirmDeleteModal')
    <div class="container-fluid">
        <br>

        <div class="card shadow mb-4">
            <div >
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="m-0 font-weight-bold">Produits</h2>
                    </div>

                </div>
                @if( count($data) > 0 )
                <div class="ml-3 mr-3 mt-3">
                    <div class="table-responsive text-dark">
                        <table class="table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>nom_produit</th>
                                    <th>nom_categorie</th>
                                    <th>nom_sous_categorie</th>
                                     <th>numserie</th>
                                    <th>numinv</th>
                                    <th>qtstocke</th>
                                    <th>prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)

                                    <tr class="text-center searchable-element">
                                        <td>{{ $item->nom_produit }}</td>
                                        <td>{{ $item->nom_categorie }}</td>
                                        <td>{{ $item->nom_sous_categorie }} </td>
                                        <td>{{ $item->numserie }}</td>
                                        <td>{{ $item->numinv }}</td>
                                        <td>{{ $item->qtstocke }}</td>
                                        <td>{{ $item->prix }}</td>

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <p class="m-5 text-center">Aucune donnée disponible.</p>
            @endif
            </div>
        </div>
    </div>




    <!-- lengthChange: false,  searching: false, -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


@endsection
