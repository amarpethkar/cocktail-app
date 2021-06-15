{{-- include app layout --}}
@extends('layouts.app')

{{-- content to be appned at app layout --}}
@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1 id="heading">Welcome to Laravel Cocktail App</h1>
                <h3 id="heading"> Get Ingredient </h3>
                <div class="">
                    <form id="ajaxform">
                        <div class="mb-3">
                            {{-- <label for="name" class="form-label">Enter Ingredient Name </label> --}}
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Ingredient Name">
                            <div class="form-text"> Ex. Vodka/Rum/Gin </div>
                            <div class="form-text"><a href="#" target='_blank'>Click here to know more about cocktail Ingredient</a></div>
                        </div>
                        <button class="btn btn-primary search-ingredient">Search</button>
                    </form>
                </div>
            <br>
        </div>
        <div>
            <div class="card" style="width: 100%; display: none;" id="card-details">
                <div class="card-body">
                    <h5 class="card-title" id='title'></h5>
                    <h6 class="card-subtitle mb-2 text-muted" id='alcohol'></h6>
                    <p class="card-text" id='description'>
                    </p>
                </div>
            </div>
        </div>
    </div>


    {{-- make ajax call to API  --}}
    <script>
        $(".search-ingredient").click(function(event){
            event.preventDefault();
            let name = $("input[name=name]").val();
            //console.log(name);
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/get-ingredient",
                type:"POST",
                data:{
                    name : name,
                    _token: _token
                },
                success:function(response){
                    debugger
                    // On ajax success load responce data
                if(response['status'] == 'success') {
                    let title = `
                      Ingredient:  <h3>${response['apiResponse'][0]['strIngredient']}</h3>
                    `;
                    document.getElementById('title').innerHTML = title;

                    let alcohol = `
                        Alcohol : <h3>${response['apiResponse'][0]['strAlcohol']}</h3>
                    `;
                    document.getElementById('alcohol').innerHTML = alcohol;

                    let description = `
                      Description:  <p>${response['apiResponse'][0]['strDescription']}</p>
                    `;
                    document.getElementById('description').innerHTML = description;
                    document.getElementById("card-details").style.display = 'block';
                } else if(response == 'empty'){
                    console.log(response);
                } else {
                    // This is debugging area
                    console.log(response);
                }
                },
            });
        });
    </script>
@endsection