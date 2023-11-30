<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\WhatsappContact;

class WhatsappMessage extends Model
{
    public $table = 'whatsapp_messages';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'whatsapp_user_id',
        'sender_id',
        'messageText',
        'messageMedia',
        'messageDocument',
        'messageRecording',
        'messageTime',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'whatsapp_user_id' => 'string',
        'sender_id' => 'integer',
        'messageText' => 'string',
        'messageMedia' => 'string',
        'messageDocument' => 'string',
        'messageRecording' => 'string',
        'messageTime' => 'string',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'whatsapp_user_id' => 'required',
        'sender_id' => 'required',
        'messageTime' => 'required',
    ];
}
