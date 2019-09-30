<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $primaryKey = 'idordonnances';
    protected $fillable = [
        'idmedecins', 'idpatients', 
    ];


    public static function scopeJoinPatient($query){
    	return $query->join('patients','patients.idpatients','ordonnances.idpatients');
    }

    public static function scopeJoinMedecin($query){
    	return $query->join('medecins','medecins.idmedecins','ordonnances.idmedecins');
    }
}
