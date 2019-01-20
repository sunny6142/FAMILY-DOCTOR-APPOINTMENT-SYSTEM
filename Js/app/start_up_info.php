<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class start_up_info extends Authenticatable
{
    protected $primaryKey = 'user_id';
    protected $table = 'start_up_info';
    protected $guarded = [];

}
