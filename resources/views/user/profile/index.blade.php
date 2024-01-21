@extends('layouts.public.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Moj profil') }}</div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="card mb-0">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form action="{{ route('user.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="first_name">Ime</label>
                                        <input type="text" class="form-control" id="name" name="first_name" placeholder="Enter name" value="{{ Auth::user()->first_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Prezime</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter name" value="{{ Auth::user()->last_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  value="{{ Auth::user()->email }}" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" value="{{ Auth::user()->password }}" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-1">Spremi promjene</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".alert").delay(2000).slideUp(200, function() {
    $(this).alert('close');
});
</script>
@endsection
