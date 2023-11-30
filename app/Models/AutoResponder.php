<?php

namespace App\Models;

use Eloquent as Model;

class AutoResponder extends Model
{
    public $table = 'auto_responders';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'session',
        'keyword',
        'percentage',
        'response',
        'response_file',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'session' => 'string',
        'keyword' => 'string',
        'percentage' => 'integer',
        'response' => 'string',
        'response_file' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session' => 'required',
        'keyword' => 'required',
    ];
}
