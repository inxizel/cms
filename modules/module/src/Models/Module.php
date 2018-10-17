<?php

namespace Zent\Module\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /*
     * Tables
     */
    
    protected $tables = "modules";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'note'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
