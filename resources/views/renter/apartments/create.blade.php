@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Dodaj stan</div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="row" action="{{ route('renter.apartment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" id="user" name="user_id" value="{{ Auth::user()->id }}">
                                <label for="city" class="form-label">Grad:</label>
                                <select class="form-select" name="city_id" aria-label="Default select example">
                                    <option selected disabled>Odaberite grad:</option>
                                    @foreach($cities as $city)
                                        <option  value="{{ $city->id }}" @selected(old('city_id') == $city->id)>
                                            {{ $city->name }}
                                        </option>
                                    
                                    @endforeach
                                </select>
                                @if($errors->has('city_id'))
                                    <p class="alert alert-danger">{{ $errors->first('city_id') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Naziv oglasa:</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <p class="alert alert-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Adresa:</label>
                                <input type="address" class="form-control" name="address" value="{{ old('address') }}">
                                @if($errors->has('address'))
                                    <p class="alert alert-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Kontakt:</label>
                                <input type="text" class="form-control" name="contact" value="{{ old('contact') }}">
                                @if($errors->has('contact'))
                                    <p class="alert alert-danger">{{ $errors->first('contact') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Cijena:</label>
                                <input type="number" class="form-control" min="1" name="price" value="{{ old('price') }}">
                                @if($errors->has('price'))
                                    <p class="alert alert-danger">{{ $errors->first('price') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="square_meter" class="form-label">Kvadrata:</label>
                                <input type="number" class="form-control" min="5" max="300" name="square_meter" value="{{ old('square_meter') }}">
                                @if($errors->has('square_meter'))
                                    <p class="alert alert-danger">{{ $errors->first('square_meter') }}</p>
                                @endif
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="description">Opis:</label>
                                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                                @if($errors->has('description'))
                                    <p class="alert alert-danger">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="floor" class="form-label">Kat:</label>
                                <input type="number" class="form-control" min="0" max="30" name="floor" value="{{ old('floor') }}">
                                @if($errors->has('floor'))
                                    <p class="alert alert-danger">{{ $errors->first('floor') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="year_of_construction" class="form-label">Godina izgradnje:</label>
                                <input type="number" class="form-control" min="1970" max="<?php echo date('Y'); ?>" step="1" name="year_of_construction"  value="2000">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label" name="type">Tip stana:</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="garsonjera">Garsonjera</option>
                                    <option value="jednosoban">Jednosoban</option>
                                    <option value="dvosoban">Dvosoban</option>
                                    <option value="trosoban">Trosoban</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">Stanje:</label>
                                <select class="form-select" name="state" aria-label="Default select example">
                                    <option value="novogradnja">Novogradnja</option>
                                    <option value="starogradnja">Starogradnja</option>
                                    <option value="renoviran">Renoviran</option>
                                </select>
                            </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Odaberite slike:</label>
                                    <input class="form-control" type="file" name="image[]" id="formFile" multiple>
                                </div>
                            <h3>Osobine</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="balconi" value="1">
                                        <label class="form-check-label" for="check1">Balkon</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="internet" value="1">
                                        <label class="form-check-label" for="check2">Internet</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="climate" value="1">
                                        <label class="form-check-label">Klima</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="elevator" value="1">
                                        <label class="form-check-label">Lift</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="cable_tv" value="1">
                                        <label class="form-check-label">Kabelska TV</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="furnished" value="1">
                                        <label class="form-check-label">Namješten</label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="pets" value="1">
                                        <label class="form-check-label">Kućni ljubimci</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="parking" value="1">
                                        <label class="form-check-label">Parking</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Dodaj apartman</button>
                        </div>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
