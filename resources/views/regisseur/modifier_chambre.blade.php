@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                   <form action="/modifier_pavillon" method="post">
                       @csrf
                     <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">modifier une ou plusieurs chambres</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>
                              <input type="hidden" name="idPav" value="<?php echo($idPav); ?>">
                              <input type="hidden" name="idEtage" value="<?php echo($idEtage); ?>">
                              <label>Numero Chambre</label></br>
                              <?php 
                                $nbChambre=DB::SELECT("select count(*) as nb,id from chambres where idEtage=$idEtage group by id");
                                  $nbChambre=count(json_decode(json_encode($nbChambre), true));
                                  
                              ?>
                              <input type="number" name="numero" min="1" max="<?php echo($nbChambre); ?>">
                              <input type="submit" name="valider" value="modifier une chambre" class="">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
