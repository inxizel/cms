<?php

namespace Zent\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*
     * Tables
     */
    
    protected $tables = "users";

    /*
     * Fillables
     */
    
    protected $fillable = ['email', 'password', 'status', 'remember_token', 'name', 'gender', 'birthday', 'mobile','type'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];

}
