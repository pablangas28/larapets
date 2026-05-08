<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'photo',
    ];

    // Relationship - Pet has many Adoptions
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function scopeNames($pets, $q)
    {
        if (trim($q)) {
            $pets->where('name', 'LIKE', "%$q%")
                 ->orWhere('kind',     'LIKE', "%$q%")
                 ->orWhere('breed',    'LIKE', "%$q%")
                 ->orWhere('location', 'LIKE', "%$q%");
        }
    }

    public function scopeKinds($pets, $q) {
        if (trim($q)) {
            $pets->where('name', 'LIKE', "%$q%")
                 ->Where('status', 0)
                 ->orWhere('kind',    'LIKE', "%$q%")
                 ->Where('status', 0);
        }
    }
}