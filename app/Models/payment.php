<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $guarded = [''];

      /**
     * Get the user that owns the employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employers()
    {
        return $this->belongsTo(employers::class);
    }
}
