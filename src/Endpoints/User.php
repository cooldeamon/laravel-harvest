<?php

namespace Byte5\LaravelHarvest\Endpoints;

use Carbon\Carbon;

class User extends BaseEndpoint
{
    /**
     * @return mixed
     */
    protected function getPath()
    {
        return 'users';
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return \Byte5\LaravelHarvest\Models\User::class;
    }

    /**
     * @return mixed
     */
    public function me()
    {
        $this->buildUrl('/me');

        return $this->get();
    }
    public function updatedSince($dateTime)
    {
        if (! $dateTime instanceof Carbon) {
            $dateTime = Carbon::parse($dateTime);
        }
        $this->params += ['updated_since' => $dateTime->toIso8601ZuluString()];
    }
}
