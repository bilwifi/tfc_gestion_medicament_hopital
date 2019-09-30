<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $primaryKey = 'idprescriptions';
    protected $fillable = [
        'idordonnances', 'idmedicaments', 'quantite','description'
    ];
    


    public static function byOrdonnance($idordonnances){
    	return self::JoinMedicament()->where('idordonnances',$idordonnances)->get();
    }

    public static function scopeJoinMedicament($query){
    	return $query->join('medicaments','medicaments.idmedicaments','prescriptions.idmedicaments');
    }
}
