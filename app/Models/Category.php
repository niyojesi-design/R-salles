<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['name'];

    /**
     * Get the salles for the category.
     */
    public function salles()
    {
        return $this->hasMany(Salle::class);
    }
}
