@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Odaberi ulogu
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user) }}" method="POST">
                        @csrf
                        @foreach($roles as $role)
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" required value="{{ $role->id }}" {{ ($role->id == $user->roles->first()->id) ? "checked" : "" }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                <b>{{ $role->name }}</b>
                            </label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Azuriraj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
