<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

   public function offres()
{
    return $this->belongsToMany(
        Offre::class,
        'offre_competence',
        'competence_id',
        'offre_id'
    );
}
}