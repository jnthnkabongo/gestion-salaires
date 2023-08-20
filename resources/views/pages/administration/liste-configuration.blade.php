@extends('layouts.entete-dash')
@section('content')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Liste configuration</h1>
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            <div class="col-auto">
                                <a href="{{ route('afficher-configuration') }}" type="submit" class="btn app-btn-primary">Nouvelle configuration</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="#">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg>
                                    Download CSV
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div>
            </div>


            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Configuration</a>
            </nav>


            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">N°</th>
                                            <th class="cell">Type</th>
                                            <th class="cell">Valeur</th>
                                            <th class="cell">Date de création</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($configurationliste as $config)
                                        <tr>
                                            <td class="cell">{{ $config->id }}</td>
                                            <td class="cell">
                                                @if($config->type == 'PAYMENT_DATE')
                                                    DATE MENSUEL DE PAIEMENT
                                                @endif
                                                @if($config->type == 'APP_NAME')
                                                    NOM DE L'APPLICATION
                                                @endif
                                                @if($config->type == 'DEVELOPPER_NAME')
                                                    EQUIPE DE DEVELOPPEMENT
                                                @endif
                                                @if($config->type == 'ANOTHER')
                                                    AUTRES CONFIGURATION
                                                @endif
                                            </td>
                                            <td class="cell">{{ Str::upper($config->value) }}</td>
                                            <td class="cell">{{ $config->created_at }}</td>
                                            <td class="cell">
                                                <a class="btn-lg app-btn-secondary" href="{{ route('liste-configuration', $config->id) }}">&nbsp;<i class="fa-solid fa-edit"></i>&nbsp;Modifier&nbsp;</a>
                                                <a class="btn-sm app-btn-secondary" href="{{ route('supprimer-configuration',$config->id) }}"><i class="fa-solid fa-trash"></i>&nbsp;Supprimer&nbsp;</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    @if(Session::has('message'))
                                        <script>
                                            swal("Message", "{{ Session::get('message') }}", 'success', {
                                                button:true,
                                                button: "OK"
                                            });
                                        </script>
                                    @endif

                                    @if(Session::has('Message'))
                                        <script>
                                            swal("Message", "{{ Session::get('Message') }}", 'error', {
                                                button:true,
                                                button: "OK"
                                            });
                                        </script>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            {{ $configurationliste->links()}}
                        </ul>
                    </nav><!--//app-pagination-->

                </div><!--//tab-pane-->
            </div>
        </div>
    </div>
</div>
@endsection
