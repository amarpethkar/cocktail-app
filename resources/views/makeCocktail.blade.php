{{-- include app layout --}}
@extends('layouts.app')

{{-- content to be appned at app layout --}}
@section('content')
    <div class="container">
        @if(count($cocktailDetails) > 0)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img
                            src="{{$cocktailDetails[0]['strDrinkThumb']}}"
                            alt="{{$cocktailDetails[0]['strDrink']}}"
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$cocktailDetails[0]['strDrink']}}</h5>
                            <p class="card-text">
                                {{$cocktailDetails[0]['strInstructions']}}
                            </p>
                            <p class="card-text">
                            <small class="text-muted">Category: {{$cocktailDetails[0]['strCategory']}} / {{$cocktailDetails[0]['strAlcoholic']}}</small>
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Ingredient</th>
                                        <th scope="col">Measure</th>
                                    </tr>
                                </thead>
                                <tbody id='ingredient-list'>
                                    @for ($i = 1; $i < 16; $i++)
                                        @if($cocktailDetails[0]['strIngredient'.$i] != null)
                                            <tr>
                                                <th scope="row">{{$cocktailDetails[0]['strIngredient'.$i]}}</th>
                                                <td>{{$cocktailDetails[0]['strMeasure'.$i]}}</td>
                                            </tr>
                                        @endIf
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         @else 
            <p> No Cocktail Found <p>
        @endif

    </div>

@endsection