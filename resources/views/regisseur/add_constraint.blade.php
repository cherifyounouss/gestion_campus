@extends('layouts/app')

@section('content')

    <div class="container">

        <div class="jumbotron">

            <div class="card">

                <div class="card-header text-center">Ajout de contraintes</div>

                <div class="card-body">
                    
                <form action="{{url("/constraint/add")}}" method="post">

                        <div class="form-group">

                            <label for="pavillon" class="form-control">Pavillon</label>

                            <select name="pavillon" id="pavillon" class="form-control" data-dependent="pavillon" required>

                                <option value="">Choisissez un pavillon</option>
                            
                                @foreach ($pavillons as $pavillon)
                                
                                    <option value="{{$pavillon->id}}">{{$pavillon->libelle}}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="etage" class="form-control">Etage</label>

                            <select name="etage" id="etage" class="form-control" data-dependent="etage">

                                <option value="">Choisissez un étage</option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label for="chambre" class="form-control">Chambre</label>

                            <select name="chambre" id="chambre" class="form-control">

                                <option value="">Choisissez une chambre</option>
                            
                            </select>

                        </div>


                        <div class="form-group">

                            <label for="sex" class="form-control">Contrainte sur le sexe</label>

                            <span>Aucune</span>
                            
                            <input type="radio" name="sex" value="" checked>
                            
                            <span>Masculin</span>
                            
                            <input type="radio" name="sex" value="M">
                            
                            <span>Feminin</span>

                            <input type="radio" name="sex" value="F">
                        
                        </div>

                        <div class="form-group">

                            <label for="level" class="form-control">Niveau d'étude</label>

                            <select name="level" class="form-control">
                     
                                <option value="">Choisir un niveau d'étude</option>

                                <option value="DUT 1"> DUT 1</option>
                     
                                <option value="DUT 2"> DUT 2</option>

                                <option value="DIC 1"> DIC 1</option>

                                <option value="DIC 2"> DIC 2</option>

                                <option value="DESCAF 1"> DESCAF 1</option>
                                
                                <option value="DESCAF 2"> DESCAF 2</option>

                            </select>

                        </div>


                        {{ csrf_field() }}


                        <input type="submit" value="Enregistrer les contraintes" class="btn btn-info col-md-12">

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        $('#pavillon').change(function(){

            var pavillon_id = $(this).children("option:selected").val();

            var _token =  $('input[name="_token"]').val();

            if(pavillon_id !=''){

                $.ajax({

                    url:"{{ route('constraints_controller.fetch') }}",

                    method:"POST",

                    data:{element_id:pavillon_id, type:"pavillon", _token:_token},

                    success:function(result){

                        $('#etage option').remove();

                        $('#etage').append(result);
                        
                    }

             });
             
            }

        });

        $('#etage').change(function(){

        var etage_id = $(this).children("option:selected").val();

        var _token =  $('input[name="_token"]').val();

        if(etage_id !=''){

        $.ajax({

        url:"{{ route('constraints_controller.fetch') }}",

        method:"POST",

        data:{element_id:etage_id, type:"etage", _token:_token},

        success:function(result){

            $('#chambre option').remove();

            $('#chambre').append(result);
        
        }

     });

}

});

    });
</script>
@endsection