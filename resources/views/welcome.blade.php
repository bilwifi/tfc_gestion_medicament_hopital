@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              {{-- <div class="card-header">Header</div> --}}
              <div class="card-body">
                <a href="{{ route('login') }}" class="btn btn-success">
                    <h5 class="card-title " ><i class=" fas fa-capsules fa-2x"></i></h5>
                    <h5 class="card-text">PHARMACIE</h5>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              {{-- <div class="card-header">Header</div> --}}
              <div class="card-body">
                <a href="{{ route('medecin-login') }}" class="btn btn-success">
                    <h5 class="card-title " ><i class="  fas fa-user-md fa-2x"></i></h5>
                    <h5 class="card-text">MEDECIN</h5>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>
@include('partials.includes.formulaires._add_ordonnance')

@endsection
