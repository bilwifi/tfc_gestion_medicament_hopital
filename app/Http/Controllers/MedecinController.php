<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Ordonnance;
use App\Models\Prescription;

use App\DataTables\Medecins\ListeOrdonanceDataTable;
use App\DataTables\Medecins\ListOrdonnanceArchiveeDataTable;
use App\Http\Requests\CreateOrdonnanceRequest;
use App\Http\Requests\AddPrescriptionRequest;
use Flashy;

class MedecinController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:medecin')->except(['viewOrdonnance']);
    }
    public function index(){
    	return view('medecin.index');
    }

    public function createOrdonnance(CreateOrdonnanceRequest $request){
    	$ordonnance = Ordonnance::create($request->except('_token'));
        Flashy::message('Ordonnance créee avec succès');
        return redirect()->route('view_ordonnance',$ordonnance->idordonnances);
    }

    public function viewOrdonnance(Ordonnance $ordonnance){
        return view('view_ordonnance',compact('ordonnance'));
    }

    public function addPrescription(AddPrescriptionRequest $request){
        $prescription = Prescription::updateOrCreate($request->except('_token'));
        Flashy::message('Prescription ajoutér avec succès');
        return redirect()->route('view_ordonnance',$prescription->idordonnances);
    }

    public function sendOrdonnance(Ordonnance $ordonnance){
        $ordonnance->statut = "envoyer";
        $ordonnance->save();
        Flashy::message('Ordonnance envoyer avec succès');
        return redirect()->route('view_ordonnance',$ordonnance->idordonnances);

    }

    public function listOrdonnance(ListeOrdonanceDataTable $dataTable){
        return $dataTable->with(["idmedecins"=>auth()->user()->idmedecins])->render('medecin.list_ordonnance');
    }

    public function listOrdonnanceArchivee(ListOrdonnanceArchiveeDataTable $dataTable){
        return $dataTable->with(["idmedecins"=>auth()->user()->idmedecins])->render('medecin.list_ordonnance');
    }
}
