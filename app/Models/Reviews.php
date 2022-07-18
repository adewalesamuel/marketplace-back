<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model
{
    use HasFactory, SoftDeletes;
            
	public function client()
	{
		return $this->belongsTo(Client::class); 
	}
	public function artisan()
	{
		return $this->belongsTo(Artisan::class); 
	}
}