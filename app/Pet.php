<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'kind', 'age', 'gender', 'is_vaccinated', 'owner_id', 'vet_id',
    ];

    protected $casts = [
        'age' => 'integer',
        'is_vaccinated' => 'boolean'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function vet()
    {
        return $this->belongsTo(Vet::class);
    }
}
