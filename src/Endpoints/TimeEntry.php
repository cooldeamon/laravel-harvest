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
     * @return mixed
     */
    public function getModel()
    {
        return \Byte5\LaravelHarvest\Models\TimeEntry::class;
    }

    public function project($id)
    {
        $this->params += ['project_id' => $id];
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

    public function fromClient($clientid)
    {
        $this->params += ['client_id' => $clientid];
    }

}
