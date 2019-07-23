<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Contracts\Transformer;
use Byte5\LaravelHarvest\Models\Task as TaskModel;

class Task implements Transformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $task = new TaskModel;

        $tasks['external_id'] = $data['id'];
        $tasks['name'] = $data['name'];
        $tasks['billable_by_default'] = $data['billable_by_default'];
        $tasks['default_hourly_rate'] = $data['default_hourly_rate'];
        $tasks['is_default'] = $data['is_default'];
        $tasks['is_active'] = $data['is_active'];
        $task = $task->updateOrCreate(['external_id' => $data['id']], $tasks);
        return $task;
    }
}
