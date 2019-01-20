<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class request_mentor extends Authenticatable
{
   // use Sortable;

    protected $table = 'request_mentor';
    protected $guarded = [];
  
  //  public $sortable = ['id', 'professional_expertise', 'industry_vertical_experience','mentoring_session_time','problem','request_mentor_status','created_at'];
}
