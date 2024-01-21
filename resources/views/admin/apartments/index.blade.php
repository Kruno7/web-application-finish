@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Stanovi</div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naslov</th>
                                <th scope="col">Adresa</th>
                                <th scope="col">Kontakt</th>
                                <th scope="col">Cijena</th>
                                <th scope="col">Opcije</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($apartments as $apartment)
                                <tr>
                                    <th scope="row">{{ $apartment->id }}</th>
                                    <td>{{ $apartment->title }}</td>
                                    <td>{{ $apartment->address }}</td>
                                    <td>{{ $apartment->contact }}</td>
                                    <td>{{ $apartment->price }} KM</td>
                                    <td>
                                    <form action="{{ route('admin.apartment.destroy', $apartment->id) }}" method="POST" class="float-start">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Ukloni</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
