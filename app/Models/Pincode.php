<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    protected $fillable = [
        'officename',
        'pincode',
        'officeType',
        "Deliverystatus",
        "divisionname",
        'regionname',
        'circlename',
        'Taluk',
        'Districtname',
        'statename'
        ];
    
}

?>