<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'department_id',
        'designation_id',
        'date_of_join',
        'commission_date',
        'promotion_date',
        'telephone_office',
        'telephone_home',
        'pbx',
        'salary',
        'status'
    ];
}
