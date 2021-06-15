{{-- include app layout --}}
@extends('layouts.app')

{{-- content to be appned at app layout --}}
@section('content')
    <div class="container">
        @if(count($cocktailList) > 0)
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" id="previous">Previous</a></li>
                    <li class="page-item"><a class="page-link" id="next">Next</a></li>
                </ul>
            </nav>
            <div class="row">
                @foreach ($cocktailList as $cocktail)
                    <div class="col-sm-3" style="margin-bottom: 25px;">
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

    <script>
        $("#next").click(function(event){
            debugger
            event.preventDefault();
            let char = window.location.href.split('/allCocktailList/')[1];
            let nextChar = char.substring(0, char.length - 1) + String.fromCharCode(char.charCodeAt(char.length - 1) + 1);
            if(nextChar == "{" || nextChar == "[" ){
                nextChar = 'a';
            }
            var newUrl = "http://localhost/allCocktailList/" + nextChar;
            window.location.href = newUrl;
            
        });

         $("#previous").click(function(event){
            event.preventDefault();
            let char = window.location.href.split('/allCocktailList/')[1];
            let preChar = String.fromCharCode(char.charCodeAt(0) - 1);;
            if(preChar == "@" || preChar == "`"){
                preChar = 'z';
            }
            var newUrl = "http://localhost/allCocktailList/" + preChar;
            window.location.href = newUrl;
        });
    </script>
    
@endsection