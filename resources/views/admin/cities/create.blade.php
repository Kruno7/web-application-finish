@extends('layouts.admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dodaj grad
                </div>

                <div class="card-body">
                <form action="{{ route('admin.city.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        @if($errors->has('name'))
                            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif
                        <label for="name" class="form-label">Unesite grad:</label>
                        <input type="text" class="form-control" id="name" placeholder="Unesite grad" name="name" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                        @if($errors->has('zip_code'))
                            <p class="alert alert-danger">{{ $errors->first('zip_code') }}</p>
                        @endif
                        <label for="zip_code" class="form-label">Postanski broj:</label>
                        <input type="number" class="form-control" id="zip_code" placeholder="Unesite postanski broj" name="zip_code">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
