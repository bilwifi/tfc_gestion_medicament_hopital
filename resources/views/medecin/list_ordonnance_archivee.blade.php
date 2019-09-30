@extends('layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-10">
        <div class="card">

            {{-- <div class="card-header">DDDDD</div> --}}
            <div class="card-body ">
                @auth('medecin')
                <div class="row">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                          <i class="fa fa-plus"></i> Nouvelle ordonnance
                        </button>
                    </div>
                </div>
                @include('partials.includes.formulaires._add_ordonnance')
                @endauth
                 {!!$dataTable->table() !!}
            </div>
        </div>
    </div>
</div>



@endsection
@push('scripts')
  {!!$dataTable->scripts() !!}
  
@endpush