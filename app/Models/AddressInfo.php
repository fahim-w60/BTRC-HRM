<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'present_address_english',
        'present_address_bangla',
        'permanent_address_bangla',
        'nid',
        'mobile',
        'email', 
        'status'
    ];
}