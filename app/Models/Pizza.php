<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Oculta la relación 'user' cuando el modelo se convierte a un array o JSON. 
    //Esto significa que al convertir un objeto Pizza a JSON, el campo 'user' no se incluirá
    protected $hidden = [
        'user',
    ];
    //usada para convertir array a json y vicersa 
    protected $casts = [
        'toppings' => 'array',
    ];

    //$appends: Agrega un atributo adicional 'chef' al modelo.
    // Este atributo se calculará dinámicamente utilizando el método getChefAttribute.
    protected $appends = [
        'chef',
        'last_updated'
    ];
    //Define una relación de pertenencia, indicando que una Pizza pertenece a un usuario (modelo User).
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getChefAttribute(): string
    {
        return $this->user->name;
    }

    public function getLastUpdatedAttribute(): string
    {
        return $this->updated_at->diffForHumans();
    }
}
