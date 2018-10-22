<?php

namespace Zent\{Core}\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {Core} extends Model
{
    use SoftDeletes;
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
