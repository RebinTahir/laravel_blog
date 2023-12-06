<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;


    protected $fillable=[
        "ip",
        "date",
        "url",
        "post_id",
        "user_agent",
        "isrobot",
        "browser",
        "device",
        "operatingsystem"

    ];
}
