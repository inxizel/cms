<?php

namespace Zent\{Core}\Models;

use Illuminate\Database\Eloquent\Model;

class {Core} extends Model
{
    /*
     * Tables
     */
    
    protected $tables = "{core_snake_case}s";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'note'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
