<?php

namespace Byte5\LaravelHarvest\Endpoints;

use Carbon\Carbon;

class Role extends BaseEndpoint
{
    /**
     * @return mixed
     */
    protected function getPath()
    {
        return 'roles';
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return \Byte5\LaravelHarvest\Models\Role::class;
    }
    public function updatedSince($dateTime)
    {
        if (! $dateTime instanceof Carbon) {
            $dateTime = Carbon::parse($dateTime);
        }
        $this->params += ['updated_since' => $dateTime->toIso8601ZuluString()];
    }
}
