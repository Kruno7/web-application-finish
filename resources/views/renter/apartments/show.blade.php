@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">Moji apartmani </div>
                    </div>
                </div>

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
                            @foreach ($apartment->images as $image)
                            <div class="col-md-6 mt-2">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="..." height="300px">
                                    <div class="card-body">
                                        <form action="{{ route('renter.apartment.image.delete', $image->id) }}" method="POST" class="float-start">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
