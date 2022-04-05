<?php

namespace App\Models\Reports;

use App\Models\User\Information;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = "reports_comment";
    protected $fillable = [
        'id_report', 'id_user','id_answer_report','comment',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];


}
