@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">Gradovi</div>
                        <div class="col-md-6"><a class="btn btn-primary btn-sm float-end" href="{{ route('admin.city.create') }}">Dodaj grad</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Postanski broj</th>
                            <th scope="col">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <th scope="row">{{ $city->id }}</th>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->zip_code }}</td>
                                <td>
                                <a href="{{ route('admin.city.edit', $city->id) }}"><button type="button" class="btn btn-warning btn-sm float-start mx-2">Uredi</button></a>
                                <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST" class="float-start">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Izbrisi</button>
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

<script>

$(".alert").delay(3000).slideUp(200, function() {
    $(this).alert('close');
});
</script>

@endsection
