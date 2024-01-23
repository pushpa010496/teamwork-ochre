<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySlider extends Model
{
    protected $table = 'company_sliders';
    protected $fillable = ['start_date','end_date','image','descritpion'];
}
