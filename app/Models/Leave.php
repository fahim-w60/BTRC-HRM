<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'departments';

    protected $dates = ['created_at', 'updated_at'];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
    public function deleteBy()
    {
        return $this->belongsTo('App\Models\User','deleted_by','id');
    }
}