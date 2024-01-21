@extends('layouts.public.app')

@section('content')

<div class="container mt-4 mb-6" style="min-height:100vh">
    <div class="card-body">
        <h4><i class="bi bi-house-check"></i> {{ $apartment->title }}</h4><br>
        <h5><i class="bi bi-geo-alt-fill"></i> {{ $apartment->address }}</h5>
        <br>
        <h5>Kvadrata: {{ $apartment->square_meter }} m2</h5>
        <h5>Kat: {{ $apartment->floor }}</h5>
        <h5>God. izgradnje: {{ $apartment->year_of_construction }}</h5>
        <h5>Broj soba: {{ $apartment->type }}</h5>
        <h5>Stanje: {{ $apartment->state }}</h5>
        <h5>Cijena: {{ $apartment->price }} KM</h5>
        <br>
        
        <div class="row">
            
            <div class="col-md-4">
                <div class="col-md-4">Balkon: 
                    @if ($apartment->balcony == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                <div class="col-md-4">Lift: 
                    @if ($apartment->elevator == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                <div class="col-md-4">Klima:
                    @if ($apartment->climate == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">Parking: 
                    @if ($apartment->climate == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                <div class="col-md-4">Wi-fi: 
                    @if ($apartment->climate == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                <div class="col-md-4">Kabelska TV: 
                    @if ($apartment->climate == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-4">Namjesten: 
                    @if ($apartment->furnished == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                <div class="col-md-4">Kucni ljubimci: 
                    @if ($apartment->climate == 1)
                    <i class="bi bi-check-square"></i>
                    @else
                    <i class="bi bi-dash-square"></i>
                    @endif
                </div>
                
            </div>
            
        </div>
        @if (Auth::check())
            <a href="{{ route('user.apartment.send-message', $apartment->id) }}" class="btn btn-primary btm-sm mt-4">Posalji poruku iznajmljivacu</a>
        @else
            Ako zelite poslati poruku iznajmljivacu, morate se prijaviti <a href="{{ route('login') }}"  class="btn btn-primary btn-sm">Prijava</a>
        @endif
        <hr>
        
        <div class="row">
            @foreach ($apartment->images as $image)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" height="250" alt="...">
            </div>
            @endforeach
        </div>
        <hr>
    </div>
</div>
    

@endsection

<script>
    
    function sendMessage () {
        document.getElementById("asd").style.display = "block";
        
    }
</script>