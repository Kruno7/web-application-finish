@extends('layouts.public.app')

@section('content')

     
<div class="row"> 
    <img src="{{ asset('storage/buildings.png') }}" style="height:50vh; width:100%">
    
    <div class="col-md-7 mx-auto" style="margin-top: -60px; padding: 25px;">
        <h1 class="text-center shadow-lg p-2 bg-warning rounded m-1">Pronađite smještaj u bilo kojem gradu!</h1>
    </div>
</div>
<div class="row mt-10">
    <div class="col-md-7 mx-auto">
        <form action="details.php" method="post" class="p-3">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control form-control-lg rounded-2 border-info" placeholder="Unesite ime grada..." autocomplete="off" required>
                
                <button type="button" class="btn btn-primary btn-lg rounded">Traži</button>
                
                <div class="input-group-append">
                    
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-md-5" style="position: relative; margin-top: -30px; margin-left: 20%;">
        <div class="list-group mt-2 mx-4" id="show-list">
            
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
  // Send Search Text to the server
    $("#search").keyup(function () {
        let searchText = $(this).val();
        if (searchText !== "") {
        $.ajax({
            url: "{{ URL::to('search') }}",
            method: "GET",
            data: {
                name: searchText,
            },
            success: function (response) {
                $('#show-list').html('')
                $.each(response.cities, function(key, value){
                    var url = '{{ route("user.serach.city", ":id") }}';
                    url = url.replace(':id', value.id);
                    $('#show-list').append('<a href="'+ url +'" class="list-group-item list-group-item-action mt-2">'+ value.name +'</a>')
                })
            },
        });
        } else {
            $("#show-list").html("");
        }
    });
});

</script>

@endsection('content')