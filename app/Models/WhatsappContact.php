<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\WhatsappMessage;

class WhatsappContact extends Model
{
    public $table = 'whatsapp_contacts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'instance_id',
        'phone',
        'username',
        'profile',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'instance_id' => 'integer',
        'phone' => 'integer',
        'username' => 'string',
        'profile' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'instance_id' => 'required',
        'phone' => 'required',
        'username' => 'required',
    ];

    public function lastMessage()
    {
        return $this->hasOne(WhatsappMessage::class, 'whatsapp_user_id', 'id')
            ->latest();
    }
    public function getLastMessageAttribute()
    {
        $lastMessage = $this->lastMessage()->first();
        
        if ($lastMessage) {
            if ($lastMessage->messageText) {
                return $lastMessage->messageText;
            } else if ($lastMessage->messageMedia) {
                return 'Media File';
            } else if ($lastMessage->messageDocument) {
                return 'Document';
            } else if ($lastMessage->messageRecording) {
                return 'Recording';
            }
        }
        
        return null;
    }
    public function unreadMessagesCount()
    {
        return $this->hasMany(WhatsappMessage::class, 'whatsapp_user_id', 'id')
            ->where('status', 0) // Add any other conditions if needed
            ->count();
    }

}
