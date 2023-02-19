<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

	public function serie() {
		return $this->belongsTo(Serie::class, 'serie_id');
	}

    public function chapters() {
		return $this->hasMany(Chapter::class, 'season_id');
	}

	public function subtitles() {
		return $this->hasMany(Subtitle::class, 'season_id');
	}
}
