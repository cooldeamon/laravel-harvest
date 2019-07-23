<?php

namespace Byte5\LaravelHarvest\Endpoints;

use Carbon\Carbon;

class TimeEntry extends BaseEndpoint
{
    /**
     * @return mixed
     */
    protected function getPath()
    {
        return 'time_entries';
    }

    /**
     * @param $id
     */
    public function client($id)
    {
        $this->params += ['client_id' => $id];
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return \Byte5\LaravelHarvest\Models\TimeEntry::class;
    }

    /**
     * @param $dateTime
     */
    public function updatedSince($dateTime)
    {
        if (! $dateTime instanceof Carbon) {
            $dateTime = Carbon::parse($dateTime);
        }

        $this->params += ['updated_since' => $dateTime->toIso8601ZuluString()];
    }
}
