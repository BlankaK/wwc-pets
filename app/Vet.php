<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'years_practice',
    ];

    protected $casts = [
        'years_practice' => 'integer'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner_id');
    }
}
