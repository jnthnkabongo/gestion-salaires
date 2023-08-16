<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'postnom',
        'email',
        'sexe',
        'age',
        'contact',
        'montant_jourmalier',
        'departement_id',
        'roles_id'
    ];

    /**
     * Get the user that owns the employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo(departement::class);
    }
}
