<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'living_structure', 'lives_with_kids',
    ];

    protected $casts = [
        'lives_with_kids' => 'boolean'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner_id');
    }
}
