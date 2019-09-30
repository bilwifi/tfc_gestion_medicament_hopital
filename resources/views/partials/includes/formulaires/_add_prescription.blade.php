<!-- Modal -->
<div class="modal fade " id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        @include('partials._msgFlash')
           <form  method="POST" id="myForm" action="{{ route('medecin.add_prescription') }}" enctype="multipart/form-data">
            @csrf
            @auth('medecin')
            <input type="text" name="idordonnances" value="{{ $ordonnance->idordonnances }}" hidden="">
            @endauth
            <div class="form-group">
              <label for="idmedicaments">Medicament</label>
              <select class="form-control" id="idmedicaments" required="" name="idmedicaments" required="">
                @foreach(App\Models\Medicament::get() as $d)
                <option value="{{ $d->idmedicaments }}">{{ $d->lib}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="quantite">Quantité</label>
              <input type="number" class="form-control" id="quantite" placeholder="" name="quantite" value="{{ old('quantite') }}" required="">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" placeholder="" name="description" value="{{ old('description') }}" required="">
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
       </form>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">

  </script>
  @endpush