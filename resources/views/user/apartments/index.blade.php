@extends('layouts.public.app')

@section('content')

<div class="container mt-4" style="min-height:80vh">
    <div class="card-body">
        <h3>Stanovi</h3>
        <hr>
        <div class="row">
        @foreach($apartments as $apartment)
            <div class="col-md-4">
                <div class="card">
                    <img src="https://www.akta.ba/resources/Promotions/Images/befaf08b-7a16-4fee-9aa9-89e671ada531sarajevotower_stanovi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title }}</h5>
                        <p class="card-text">{{ $apartment->address }}.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cijena: {{ $apartment->price }} KM</li>
                        <li class="list-group-item">Tip stana: {{ $apartment->type }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('user.apartment.show', $apartment) }}" class="btn btn-primary btn-sm">Prikaži stan</a>
                        
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
   

@endsection
