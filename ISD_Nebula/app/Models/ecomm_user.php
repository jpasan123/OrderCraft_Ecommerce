<?php

namespace App\Models;

use App\Models\ecomm_login;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ecomm_user extends Authenticatable
{
    use HasFactory;

}
