@extends('layouts.admin.app')

@section('content')
<div class="container">
    
    <div class="row my-2">
        <div class="col-md-6"><h3>Moji Stanovi</h3>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        
        <div class="col-md-6">
            <div class="text-end">
                <a class="btn btn-primary" href="{{ route('renter.apartment.create') }}">Dodaj novi stan</a>
            </div>
                
        </div>
    </div>

    <table class="table table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naslov</th>
            <th scope="col">Adresa</th>
            <th scope="col">Opis</th>
            <th scope="col">Opcije</th>
        </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
            <tr>
                <th scope="row">{{ $apartment->id }}</th>
                <td>{{ $apartment->title }}</td>
                <td>{{ $apartment->address }}</td>
                <td>{{ $apartment->description }}</td>
                <td>
                    <a href="{{ route('renter.apartment.show', $apartment) }}"><button type="button" class="btn btn-primary btn-sm">Prikazi</button></a>
                    <a href="{{ route('renter.apartment.edit', $apartment) }}"><button type="button" class="btn btn-warning btn-sm">Uredi</button></a>
                    <a href="{{ route('renter.apartment.delete', $apartment) }}"><button type="button" class="btn btn-danger btn-sm">Izbrisi</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>

$(".alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});

</script>
@endsection
