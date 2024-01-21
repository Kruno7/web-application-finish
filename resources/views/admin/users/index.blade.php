@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Korisnici') }}</div>
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Uloga</th>
                            <th scope="col">Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->first() }}</td>
                            <td>
                                <a href="{{ route('admin.user.edit', $user->id) }}"><button type="button" class="btn btn-primary btn-sm float-start mx-2">Uredi</button></a>
                                <form action="{{ route('admin.user.destory', $user->id) }}" method="POST" class="float-start">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-warning btn-sm">Izbrisi</button>
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
