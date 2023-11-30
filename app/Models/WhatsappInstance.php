<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\WhatsappContact;

class WhatsappInstance extends Model
{
    public $table = 'whatsapp_instances';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'session_name',
        'instance_phone',
        'instance_username',
        'instance_profile',
        'qr_code',
        'status',
        'speed',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'session_name' => 'string',
        'instance_phone' => 'integer',
        'instance_username' => 'string',
        'instance_profile' => 'string',
        'qr_code' => 'string',
        'status' => 'integer',
        'speed' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'session_name' => 'required',
    ];

}
