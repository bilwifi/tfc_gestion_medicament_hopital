<?php

namespace App\DataTables\Pharmacie;

use App\Models\Ordonnance;
use Yajra\DataTables\Services\DataTable;

class ListOrdonnanceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($query){
                return '<a href="'.route('view_ordonnance',$query->idordonnances).'" class="btn btn-success" ><i class="fa fa-eye"></i></a> '.
                    ' <a href="'.route('archiver_ordonnance',$query->idordonnances).'" class="btn btn-success" ><i class="fa fa-archive   "></i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ordonnance $model)
    {
        return $model->JoinPatient()->JoinMedecin()->where('ordonnances.statut','en_cours')->get([
            'ordonnances.idordonnances',
            'ordonnances.updated_at',
            'patients.idpatients',
            'patients.nom',
            'patients.prenom',
            'medecins.name',
        ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '100px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'idordonnances',
            'idordonnances'=>['title'=>'#'],
            'prenom',
            'nom',
            'name'=>['title'=>'Medecin'],
            'updated_at' => ['title'=>'Date']
        ];
    }
    protected function getBuilderParameters(){
        return [
            'dom' => 'ftp',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Medecins/ListOrdonnanceArchivee_' . date('YmdHis');
    }
}
