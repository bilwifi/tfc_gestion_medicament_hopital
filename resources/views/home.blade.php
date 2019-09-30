@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
       {{--  <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              <div class="card-body">
                <button type="button" class="addModal btn btn-success" data-toggle="modal" data-target="#exampleModal" >
                    <h5 class="card-title " ><i class="fas fa-plus-circle fa-2x"></i></h5>
                    <h5 class="card-text">NOUVELLE ORDONNACE</h5>
                </button>
              </div>
            </div>
        </div> --}}
        <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              {{-- <div class="card-header">Header</div> --}}
              <div class="card-body">
                <a href="{{ route('show_medicament') }}" class="btn btn-success">
                    <h5 class="card-title " ><i class=" fas fa-capsules fa-2x"></i></h5>
                    <h5 class="card-text">STOCK MEDICAMENTS</h5>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              {{-- <div class="card-header">Header</div> --}}
              <div class="card-body">
                <a href="#" class="btn btn-success">
                    <h5 class="card-title " ><i class=" fas fa-file fa-2x"></i></h5>
                    <h5 class="card-text">ORDONNANCES </h5>
                </a>
              </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center text-white bg-success mb-3" style="max-width: 18rem;">
              {{-- <div class="card-header">Header</div> --}}
              <div class="card-body">
                <a href="#" class="btn btn-success">
                    <h5 class="card-title " ><i class=" fas fa-archive fa-2x"></i></h5>
                    <h5 class="card-text">ARCHIVES ORDONNACES</h5>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>
@include('partials.includes.formulaires._add_ordonnance')

@endsection
