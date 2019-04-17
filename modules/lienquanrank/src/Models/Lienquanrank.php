<?php

namespace Zent\Lienquanrank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lienquanrank extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "lienquanranks";

    /*
     * Fillables
     */
    
    protected $fillable = ['name', 'content', 'status'];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
