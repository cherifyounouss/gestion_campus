@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des pavillons</div>

                <div class="card-body" id="accordion">
                    @foreach ($pavillons as $key => $pavillon)
                    <div class="card">
                        <div class="card-header" id="heading{{str_replace(' ', '', $key)}}">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#{{str_replace(' ', '', $key)}}" aria-expanded="true" aria-controls="collapseOne">
                                {{$key}}
                            </button>
                          </h5>
                        </div>
                        <div id="{{str_replace(' ', '', $key)}}" class="collapse show" aria-labelledby="heading{{str_replace(' ', '', $key)}}" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Etage(s)</th>
                                            <th scope="col">Nombre de chambre</th>
                                        </tr>
                                        @foreach ($pavillon as $nb => $etage)
                                        <tr>
                                            <td>{{$nb}}</td>
                                            <td>{{$etage}}</td>
                                        </tr>
                                        @endforeach
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection