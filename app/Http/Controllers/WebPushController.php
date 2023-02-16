<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Minishlink\WebPush\Subscription;

class WebPushController extends Controller
{
    public function pkey()
    {
        return response()->json(env('VAPID_PUBLIC_KEY'));
    }
    public function subscribe()
    {
        info('subcription', request()->all());
        /** @var User */
        $user = auth()->user();
        $endpoint = request()->input('endpoint');
        $key = request()->input('keys.p256dh');
        $token = request()->input('keys.auth');
        $user->updatePushSubscription($endpoint, $key, $token, 'aesgcm');
        return response()->json(status: 201);
    }
    public function unsubscribe()
    {
        /** @var User */
        $user = auth()->user();
        $user->deletePushSubscription(request()->input('endpoint'));
        return response()->json(status: 201);
    }
}
