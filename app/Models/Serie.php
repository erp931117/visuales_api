<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seasons() {
		return $this->hasMany(Season::class, 'serie_id');
	}

    public function images() {
		return $this->hasMany(Image::class, 'serie_id');
	}
}
