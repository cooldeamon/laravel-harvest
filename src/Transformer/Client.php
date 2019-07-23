<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Models\Client as ClientModel;
use Byte5\LaravelHarvest\Contracts\Transformer as TransformerContract;

class Client implements TransformerContract
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $client = new ClientModel;


        $clients['external_id'] = $data['id'];
        $clients['currency'] = $data['currency'];
        $clients['name'] = $data['name'];
        $clients['is_active'] = $data['is_active'];
        $clients['address'] = $data['address'];
        $client = $client->updateOrCreate(['external_id' => $data['id']],$clients);
        return $client;
    }
}
