<?php
namespace App\Observers;

use App\Models\MatchRecord;
use Illuminate\Support\Carbon;

class MatchRecordObserver
{
    /**
     * Handle the MatchRecord "created" event.
     *
     * @param  \App\Models\MatchRecord  $matchRecord
     * @return void
     */
    public function created(MatchRecord $matchRecord)
    {
       
        $delay = Carbon::now()->addDay();

       
        dispatch(function () use ($matchRecord) {
            if ($matchRecord->created_at->isPast()) {
                $matchRecord->delete();
            }
        })->delay($delay);
    }
}
