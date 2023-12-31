@extends('layouts.entete-dash')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Modifier département</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('liste-employer') }}" type="submit" class="btn app-btn-primary">Liste Employer</a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-1"></div>
            <div class="col-12 col-md-10 mt-3">
                <div class="app-card app-card-settings shadow-sm p-4">

                    <div class="app-card-body">
                        <form class="settings-form" action="{{ route('modifier-employer', $resultat->id) }}" method="GET">
                            @csrf
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Département Employer</label>
                                <select class="form-control" name="departement_id" id="">
                                    @foreach ($departements as $item)
                                        <option name="departement_id" value="{{ $item->id }}" {{ $resultat->departement_id === $item->id ? 'selected' : '' }} >{{ Str::upper($item->nom_dep) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Nom Employer<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                  <circle cx="8" cy="4.5" r="1"/>
                                </svg></span></label>
                                <input type="text" class="form-control" name="nom" value="{{  Str::upper($resultat->nom) }}">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Prénom Employer</label>
                                <input type="text" class="form-control" name="prenon" value="{{ Str::upper($resultat->prenom) }}">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Postnom Employer</label>
                                <input type="text" class="form-control" name="postnom" value="{{ Str::upper($resultat->postnom) }}">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">E-mail Employer</label>
                                <input type="text" class="form-control" name="email" value="{{ Str::upper($resultat->email) }}">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Sexe Employer</label>
                                <select class="form-select form-select-md md-auto " name="sexe" id="">
                                    <option value="{{ $resultat->sexe }}">{{ Str::upper($resultat->sexe) }}</option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Age Employer</label>
                                    <input type="text" class="form-control" name="age" value="{{ Str::upper($resultat->age) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Contact Employer</label>
                                    <input type="text" class="form-control" name="contact" value="{{ $resultat->contact }}">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Montant Journalier Employer</label>
                                    <input type="text" class="form-control" name="montant_journalier" value="{{ $resultat->montant_journalier }}">
                                </div>
                            </div>

                            <button type="submit" class="btn app-btn-primary" >Modifier </button>
                        </form>
                        @if(Session::has('message'))
                            <script>
                                swal("Message", "{{ Session::get('message') }}", 'success', {
                                    button:true,
                                    button: "OK"
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-1"></div>
        </div>
    </div>
</div>
@endsection
