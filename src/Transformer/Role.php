<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Contracts\Transformer;
use Byte5\LaravelHarvest\Models\Role as RoleModel;

class Role implements Transformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $role = new RoleModel;

        $role->external_id = $data['id'];
        $role->name = $data['name'];
        $role->user_ids = $data['user_ids'];
        $role = $role->updateOrCreate(['external_id' => $data['id']],$data);
        return $role;
    }
}
