<?php

namespace Zent\User\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static create($data)
 */
class User extends Authenticatable
{
    use EntrustUserTrait;

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
