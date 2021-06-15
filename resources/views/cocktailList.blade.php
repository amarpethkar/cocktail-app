{{-- include app layout --}}
@extends('layouts.app')

{{-- content to be appned at app layout --}}
@section('content')
    <div class="container">
     @if(count($cocktails) > 0)
        <div class="row">
             @foreach ($cocktails as $cocktail)
                <div class="col-sm-4" style="margin-bottom: 25px;">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" src="{{$cocktail['strDrinkThumb']}}" alt="Card image cap">
                            <h5 class="card-title">{{$cocktail['strDrink']}}</h5>
                            <br>
                            <p class="card-text">
                                Click on More to know instruction to make, list of ingredients, and image.
                            </p>
                            <a href="/cocktailMake/{{$cocktail['idDrink']}}" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
        @else 
            <p> No Cocktails Found <p>
        @endif
    </div>
    
@endsection