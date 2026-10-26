<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'capacidad', 'wifi', 'edificio_id'];

    protected $casts = [
        'wifi' => 'boolean',
    ];

    /**
     * Un aula pertenece a un edificio.
     */
    public function edificio(): BelongsTo
    {
        return $this->belongsTo(Edificio::class);
    }
}
