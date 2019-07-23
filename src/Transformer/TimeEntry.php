<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Contracts\Transformer;
use Byte5\LaravelHarvest\Models\TimeEntry as TimeEntryModel;

class TimeEntry implements Transformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $timeEntry = new TimeEntryModel;


        $timeEntries['external_id'] = $data['id'];
        $timeEntries['external_reference'] = $data['external_reference'];
        $timeEntries['hours'] = $data['hours'];
        $timeEntries['billable_rate'] = $data['billable_rate'];
        $timeEntries['cost_rate'] = $data['cost_rate'];
        $timeEntries['notes'] = $data['notes'];
        $timeEntries['is_locked'] = $data['is_locked'];
        $timeEntries['locked_reason'] = $data['locked_reason'];
        $timeEntries['is_closed'] = $data['is_closed'];
        $timeEntries['is_billed'] = $data['is_billed'];
        $timeEntries['is_running'] = $data['is_running'];
        $timeEntries['billable'] = $data['billable'];
        $timeEntries['budgeted'] = $data['budgeted'];
        $timeEntries['started_time'] = $data['started_time'];
        $timeEntries['ended_time'] = $data['ended_time'];
        $timeEntries['spent_date'] = $data['spent_date'];
        $timeEntries['timer_started_at'] = $data['timer_started_at'];

        $timeEntries['user_id'] = array_get($data, 'user.id');
        $timeEntries['user_assignment_id'] = array_get($data, 'user_assignment.id');
        $timeEntries['client_id'] = array_get($data, 'client.id');
        $timeEntries['project_id'] = array_get($data, 'project.id');
        $timeEntries['task_id'] = array_get($data, 'task.id');
        $timeEntries['task_assignment_id'] = array_get($data, 'task_assignment.id');
        $timeEntries['invoice_id'] = array_get($data, 'invoice.id');
        $timeEntrys = $timeEntry->updateOrCreate(['external_id' => $data['id']],$timeEntries);
        return $timeEntrys;
    }
}
