<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Souscription extends Model
{
    use HasFactory, SoftDeletes;
            
	public function souscriptionPack()
	{
		return $this->belongsTo(SouscriptionPack::class); 
	}
	public function artisan()
	{
		return $this->belongsTo(Artisan::class); 
	}
}