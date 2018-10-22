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
    
    protected $fillable = ['name', 'content', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
