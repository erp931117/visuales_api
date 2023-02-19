<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id');
    }
}
