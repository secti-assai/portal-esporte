<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPageView extends Model
{
    protected $fillable = ['date', 'hour', 'path', 'device', 'view_count'];
}
