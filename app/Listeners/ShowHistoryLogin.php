<?php

namespace App\Listeners;

use App\Events\UserLogin;
use App\Models\HistoryLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShowHistoryLogin
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogin $event): void
    {
        $user = $event->request->user();

        HistoryLogin::where('nama', $user->name)->delete();

        HistoryLogin::create([
            'nama' => $user->name,
            'role' => $user->role,
            'foto' => $user->avatar,
        ]);

    }


}
