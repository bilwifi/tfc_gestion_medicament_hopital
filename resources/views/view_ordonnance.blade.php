@extends('layouts.master')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="card">
			<div class="card-body">
				<div class="container">
					@if(App\Models\Prescription::byOrdonnance($ordonnance->idordonnances)->count() > 0 || auth('medecin')->user()->idmedecins == $ordonnance->idmedecins)
					<table class="table table-striped table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Designation</th>
					      <th scope="col">Quantité</th>
					      <th scope="col">Description</th>
					    </tr>
					  </thead>
					  	
					  <tbody>
					  	@php $i=1; @endphp
					  	@foreach(App\Models\Prescription::byOrdonnance($ordonnance->idordonnances) as $p)
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>{{ $p->lib }}</td>
					      <td>{{ $p->quantite }}</td>
					      <td>{{ $p->description }}</td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>	
				@if(auth('medecin')->user()->idmedecins == $ordonnance->idmedecins && $ordonnance->statut == 'en_cours')
				<div class="float-right">
					<button  class="btn btn-outline-success" data-toggle="modal" data-target="#prescriptionModal" >AJOUTER UNE PRESCRIPTION</button>
					<a href="{{ route('medecin.send_ordonnance',$ordonnance->idordonnances) }}" class="btn btn-outline-success">ENVOYER L'ORDONNANCE</a>
				</div>
				@include('partials.includes.formulaires._add_prescription')
				@endif
			</div>
			
			<div class="card-footer">
				<div class="float-right">{{ $ordonnance->updated_at }}</div>
			</div>
			@else
			@if($ordonnance == "en_cours")
				<div class="d-flex justify-content-center">
					<button  class="btn btn-outline-success" data-toggle="modal" data-target="#prescriptionModal" >AJOUTER UNE PRESCRIPTION</button>
				</div>
			@else
			<div class="d-flex justify-content-center">
					<button  class="btn btn-outline-success" >Aucune prescription disponible</button>
				</div>
			@endif
			@endif
		</div>
		
	</div>
</div>
@include('partials.includes.formulaires._add_prescription')

@endsection