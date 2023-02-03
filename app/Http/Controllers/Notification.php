<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class Notification extends Controller
{
    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        if (isset($notification->data['route'])) {
            return to_route($notification->data['route']);
        }

        return back();
    }
    public function mark(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return back();
    }
    public function delete(DatabaseNotification $notification)
    {
        $notification->delete();

        return back();
    }
    public function mark_all()
    {
        /** @var User */
        $user = auth()->user();
        $user->notifications()->markAsRead();

        return back();
    }
    public function delete_all()
    {
        /** @var User */
        $user = auth()->user();
        $user->notifications()->delete();

        return back();
    }
}
