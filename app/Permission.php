<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    public function roles(){

        $this->belongsToMany(Role::class);
    }

    public function users(){

        $this->belongsToMany(User::class);
    }
}
