<?php

namespace App\Admin;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    protected $table = 'admin';
}
