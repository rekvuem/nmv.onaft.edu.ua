<?php

namespace App\Models\Reports;

use App\Models\User\Information;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    //public $timestamps = false;
    protected $table = "reports";
    protected $fillable = [
        'id_user', 'report', 'status', 'timeplus',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];


    public function IdUserReports(){
        return $this->hasMany(User::class,'id','id_user');
    }

    public function InformationUser(){
        return $this->hasMany(Information::class,'user_id','id_user');
    }


    public function TakeUserReportComment(){
        return $this->hasMany(Comment::class, 'id_report', 'id');
    }

    public function getCommentPaginatedAttribute()
    {
        return $this->TakeUserReportComment()->orderBy('created_at','DESC')->paginate(5);
    }
}

