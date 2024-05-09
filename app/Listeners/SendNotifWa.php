<?php

namespace App\Listeners;

use App\Events\Notifwa;
use App\Models\OutBox;

class SendNotifWa
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
    public function handle(Notifwa $event): void
    {
        $message = $event->message;
        $numbers = count($event->numbers) > 0 ? $event->numbers : [env('WA_ADMIN')];
        $model = new OutBox();

        foreach ($numbers as $number) {
            try {
                $model->insert(
                    [
                        'notelp' => $number,
                        'pesan' => $message
                    ]
                );
            } catch (\Exception $e) {
                logger('terjadi kesalahan saat mengirim notif');
            }
        }
    }
}
