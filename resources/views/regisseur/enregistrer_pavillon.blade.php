@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cr&eacute;ation pavillon</div>

                <div class="card-body">
                    <form method="POST" action="{{route('pavillon.sauver')}}" id="enregistrer_form" action="{{ route('profil_utilisateur.enregistrer') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="libelle" class="col-md-4 col-form-label text-md-right">Libelle</label>

                            <div class="col-md-6">
                                <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required autofocus>
                                @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0" id="boutons">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="bouton_creer" class="btn btn-primary">
                                    Cr&eacute;er
                                </button>
                                <button type="button" id="bouton_etages" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                                    Ajouter &eacute;tage
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter &eacute;tage</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="libelle_etage" class="col-md-4 col-form-label text-md-right">Libelle</label>
                        <div class="col-md-6">
                            <input id="libelle_etage" type="text" class="form-control" name="libelle" required autofocus>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="nombre_chambre" class="col-md-4 col-form-label text-md-right">Nombre de chambres</label>
                        <div class="col-md-6">
                            <input id="nombre_chambre" type="number" min="1" class="form-control" name="libelle" required autofocus>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="button" id="ajout_etage" class="btn btn-primary">Ajouter</button>
            </div>
          </div>
        </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/pavillon.js')}}"></script>
@endsection