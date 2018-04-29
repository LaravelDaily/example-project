<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TogglReport extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'user_name',
        'file_name'
    ];

    public static $storeValidation = [
        'start_date'    => 'required',
        'end_date'      => 'required',
        'report_title'  => 'required'
    ];

}
