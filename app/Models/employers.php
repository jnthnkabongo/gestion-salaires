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
        'montant_journalier',
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

    /**
     * Get all of the comments for the employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(payment::class);
    }
}
