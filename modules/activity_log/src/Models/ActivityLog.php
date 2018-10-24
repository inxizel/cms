<?php

namespace Zent\ActivityLog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class ActivityLog extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'activity_log';

    protected $fillable = [
        'log_name', 'description', 'subject_id', 'subject_type', 'causer_id', 'causer_type', 'ip_user', 'methodType', 'userAgent', 'properties', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function user(){
        return $this->belongsTo('Zent\User\Models\User', 'causer_id', 'id');
    }
}
