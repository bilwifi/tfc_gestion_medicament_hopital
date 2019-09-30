<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medecin;
use App\Models\Ordonnance;
use App\Models\Prescription;

use App\DataTables\Pharmacie\ListOrdonnanceDataTable;
use App\DataTables\Pharmacie\ListOrdonnanceArchiveeDataTable;
use App\DataTables\Pharmacie\MedicamentDataTable;

use App\Http\Requests\CreateOrdonnanceRequest;
use App\Http\Requests\AddPrescriptionRequest;
use Flashy;

class PharmacieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pharmacie.home');
    }

    public function listOrdonnance(ListOrdonnanceDataTable $dataTable){
        return $dataTable->render('medecin.list_ordonnance');
    }

    public function listOrdonnanceArchivee(ListOrdonnanceArchiveeDataTable $dataTable){
        return $dataTable->render('medecin.list_ordonnance');
    }

    public function archiverOrdonnance(Ordonnance $ordonnance){
        $ordonnance->statut = "archiver";
        $ordonnance->save();
        Flashy::message('Ordonnance archiver avec succès');
        return redirect()->route('view_ordonnance',$ordonnance->idordonnances);

    }

    public function showMedicament(MedicamentDataTable $dataTable){
        return $dataTable->render('pharmacie.list_medicament');

    }
}
