
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  <?php for ($i=1; $i <count($pavillons)+1; $i++) { 
                              
                    ?>
                  <form action="/choix_etage" method="post">
                    <table class="table">
                      <?php if ($i==1) {
                       
                       ?>
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pavillon</th>
                            <th scope="col">modification</th>
                          </tr>
                        </thead><?php }?>
                        <tbody>
                          
                          <tr>
                            <th scope="row">{{$i}}</th>
                            
                            <td>
                              <?php  
                                $pavillon=$pavillons[$i-1]; 
                                $pavillon=json_decode(json_encode($pavillon), true); 
                                echo ($pavillon['libelle']); 
                                $id=$pavillon['id'];
                                ?>
                                  
                            </td>
                            <td>
                              <input type="hidden" name="id" value="<?php echo($id); ?>">
                              <input type="submit" name="valider" value="modifier" class="bouton_lien">
                              @csrf
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </form><?php }?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
