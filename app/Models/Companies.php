<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = [];

    // public function assignor()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 't_assignor');
    // }
}
