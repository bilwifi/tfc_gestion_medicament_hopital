<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une ordonnance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        @include('partials._msgFlash')
           <form  method="POST" id="myForm" action="{{ route('medecin.create_ordonnance') }}" enctype="multipart/form-data">
            @csrf
            @auth('medecin')
            <input type="text" name="idmedecins" value="{{ auth()->user()->idmedecins }}" hidden="">
            @endauth
            <div class="form-group">
            <label for="idpatients">Patient</label>
            <select class="form-control" id="idpatients" required="" name="idpatients" required="">
              @foreach(App\Models\Patient::get() as $d)
              <option value="{{ $d->idpatients }}">{{ $d->nom .' '.$d->prenom }}</option>
              @endforeach
            </select>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Créer</button>
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