<?php

namespace Byte5\LaravelHarvest;

use Zttp\Zttp;

class ApiGateway
{
    /**
     * @param $path
     * @return mixed
     */

    public function execute($path, $name, $patchdata = null)
    {

        if($name == 'patch' && $patchdata != null){

            return Zttp::withHeaders([
                'Authorization' => 'Bearer '.config('harvest.api_key'),
                'Harvest-Account-Id' => config('harvest.account_id'),
            ])->patch($path, $patchdata);

        }

        if($name == 'post' && $patchdata != null){

            return Zttp::withHeaders([
                'Authorization' => 'Bearer '.config('harvest.api_key'),
                'Harvest-Account-Id' => config('harvest.account_id'),
            ])->post($path, $patchdata);

        }


        return Zttp::withHeaders([
            'Authorization' => 'Bearer '.config('harvest.api_key'),
            'Harvest-Account-Id' => config('harvest.account_id'),
        ])->get($path);


    }

}
