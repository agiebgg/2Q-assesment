<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';
    protected $guarded = [];

    public function assignor()
    {
        return $this->hasOne('App\Models\User', 'id', 't_assignor');
    }

    public function assignee()
    {
        return $this->hasOne('App\Models\User', 'id', 't_assignee');
    }
}
