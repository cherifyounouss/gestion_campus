@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('pavillon_modifie') }}">
                        @csrf
                            <?php 
                            
                                $nomPav=DB::SELECT("select libelle from pavillons where id=$idPav");
                                $etages=DB::SELECT("select libelle from etages where id=$idEtage");
                                $chambre=DB::SELECT("select * from chambres where id=$numeroChambre");
                                $chambre=json_decode(json_encode($chambre['0'], true));
                                $chambre=(array)$chambre;

                                $nomPav=(array)$nomPav['0'];
                                
                                $etages=(array)$etages['0'];
                                
                             ?>

                        <div class="form-group row">
                            <label for="pavillon" class="col-md-4 col-form-label text-md-right">{{ __('Pavillon') }}</label>

                            <div class="col-md-6">
                                <input id="pavillon" type="text" class="form-control @error('pavillon') is-invalid @enderror" name="pavillon" value="{{ $nomPav['libelle'] }}" required autocomplete="pavillon" autofocus>

                                @error('pavillon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                          <div class="form-group row">
                            <label for="etage" class="col-md-4 col-form-label text-md-right">{{ __('etage') }}</label>

                            <div class="col-md-6">
                                <input id="etage" type="text" class="form-control @error('etage') is-invalid @enderror" name="etage" value="{{ $etages['libelle'] }}" required autocomplete="etage" autofocus>

                                @error('etage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Chambre') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $numeroChambre }}" required autocomplete="numero" autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                             <label for="etat" class="col-md-4 col-form-label text-md-right">{{ __('Etat') }}</label>

                            <div class="col-md-6">
                                <select name="etat" class="browser-default custom-select">
                                  <option value="1">Disponible</option>
                                  <option value="2">Non disponible</option>
                                </select>
                                
                                @error('etat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                             <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>

                            <div class="col-md-6">
                                <select name="sexe" class="browser-default custom-select">
                                  <option value="1">M</option>
                                  <option value="2">F </option>
                                </select>
                             
                                @error('sexe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         </div>
                        <div class="form-group row">
                              <label for="contarinteNV" class="col-md-4 col-form-label text-md-right">{{ __('Contrainte') }}</label>

                            <div class="col-md-6">
                                <input id="contarinteNV" type="text" class="form-control @error('contarinteNV') is-invalid @enderror" name="contarinteNV" value="{{$chambre['contrainteNiveauEtude']}}" required autocomplete="contarinteNV" autofocus>

                                @error('contarinteNV')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="idPav" value="<?php echo($idPav); ?>">
                        <input type="hidden" name="idChambre" value="<?php echo($chambre['id']); ?>">
                        <input type="hidden" name="idEtage" value="<?php echo($idEtage); ?>">
                        <input type="hidden" name="numeroChambre" value="<?php echo($numeroChambre); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
