
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  <?php for ($i=1; $i < count($etages)+1; $i++) { 
                     
                      ?>
                    <form action="/modifier_chambre" method="post">
                       @csrf
                     <table class="table">
                       <?php if ($i==1) {
                         
                         ?>
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Etage</th>
                            <th scope="col">modification</th>
                          </tr>
                        </thead><?php }?>
                        <tbody>
                         
                          <tr>
                            <th scope="row">{{$i}}</th>
                            <td>
                              <?php 
                                $etage=$etages[$i-1];
                                $etage=json_decode(json_encode($etage), true); 
                                echo($etage['libelle']); 
                                $idEtage=$etage['id'];
                                ?></td>
                            <td>
                              <input type="hidden" name="idPav" value="<?php echo($idPav); ?>">
                              <input type="hidden" name="idEtage" value="<?php echo($idEtage); ?>">
                              <input type="submit" name="valider" value="modifier" class="bouton_lien">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </form>
                <?php }?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
