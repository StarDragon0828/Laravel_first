<?php

namespace App\Services;

use App\Models\WhatsappContact;

class ChatService
{
    public static function getChatData($id, $searchTerm = null)
    {
        $query = WhatsappContact::where('instance_id', '=', $id)->with(['lastMessage']);

        if ($searchTerm !== null) {
            $query->where('username', 'like', "%$searchTerm%");
        }

        $contacts = $query->orderByDesc('lastMessageTime')->get();

        $contacts->each(function ($contact) {
            $contact->notification = $contact->unreadMessagesCount();
            $contact->last_message_value = $contact->getLastMessageAttribute();
        });
        return $contacts;
    }
}
