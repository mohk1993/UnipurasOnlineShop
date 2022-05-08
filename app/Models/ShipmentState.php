<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentState extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
    	return $this->belongsTo(Shipment::class,'division_id','id');
    }

     public function district(){
    	return $this->belongsTo(ShipmentDistric::class,'district_id','id');
    }
}
