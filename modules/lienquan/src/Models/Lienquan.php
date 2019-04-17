<?php

namespace Zent\Lienquan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lienquan extends Model
{
    use SoftDeletes;
    /*
     * Tables
     */
    
    protected $table = "lienquans";

    /*
     * Fillables
     */
    
    protected $fillable = [
        'loainick',
        'rank_id', 
        'season', 
        'taikhoan', 
        'matkhau', 
        'count_champs', 
        'count_skins', 
        'count_bangngoc', 
        'diemngoc', 
        'gia', 
        'giamgia', 
        'ip', 
        'champs', 
        'skins',
        'thongtin', 
        'trangthai', 
        'kichhoat',
        'uutien',  
        'thumb_id', 
        'image_id', 
        'user_id',
        'status'
    ];

    /*
     * Soft Deletes
     */
    
    protected $dates = ['deleted_at'];
}
