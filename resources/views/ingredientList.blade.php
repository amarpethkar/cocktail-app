{{-- include app layout --}}
@extends('layouts.app')

{{-- content to be appned at app layout --}}
@section('content')
    <div class="container">
        <h3 id="heading"> Ingredient Listing </h3>
           <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="listing-title">Ingredient List</th>
                        <th scope="col" class="listing-title">Search Cocktails</th>
                    </tr>
                </thead>
                <tbody id='ingredient-list'>
                </tbody>
            </table>
    </div>
    {{-- make ajax call to API  --}}

    <script>
        function getIngredientList() {
            let _token   = $('meta[name="csrf-token"]').attr('content');
             $.ajax({
                url: "/get-ingredient-list",
                type:"POST",
                data:{
                    _token: _token
                },
                success:function(response){
                    debugger
                if(response['status'] == 'success') {
                    for(let item of response['apiResponse']) {
                        var ingredient = item.strIngredient1.trim();
                        let list = `
                            <tr>
                                <th scope="row">${item.strIngredient1}</th>
                                <td><a href="/cocktailList/${ingredient}"><button type="button" class="btn btn-primary">Search</button></a></td>
                            </tr>
                        `;
                         document.getElementById('ingredient-list').innerHTML += list;
                    }
                   
                } else if(response == 'empty'){
                    console.log(response);
                } else {
                    // This is debugging area
                    console.log(response);
                }
                },
            });
        }
        window.onload = getIngredientList;

    </script>
@endsection