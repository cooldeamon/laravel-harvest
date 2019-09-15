<?php

namespace Byte5\LaravelHarvest\Transformer;

use Byte5\LaravelHarvest\Contracts\Transformer;
use Byte5\LaravelHarvest\Models\Project as ProjectModel;

class Project implements Transformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function transformModelAttributes($data)
    {
        $project = new ProjectModel;
   


        $proj['external_id'] =  $data['id'];
        $proj['name'] =  $data['name'];
        $proj['code'] =  $data['code'];
        $proj['is_active'] =  $data['is_active'];
        $proj['is_billable'] =  $data['is_billable'];
        $proj['is_fixed_fee'] =  $data['is_fixed_fee'];
        $proj['bill_by'] =  $data['bill_by'];
        $proj['hourly_rate'] =  $data['hourly_rate'];
        $proj['budget'] =  $data['budget'];
        $proj['budget_by'] =  $data['budget_by'];
        $proj['notify_when_over_budget'] =  $data['notify_when_over_budget'];
        $proj['over_budget_notification_percentage'] =  $data['over_budget_notification_percentage'];
        $proj['show_budget_to_all'] =  $data['show_budget_to_all'];
        $proj['cost_budget'] =  $data['cost_budget'];
        $proj['cost_budget_include_expenses'] =  $data['cost_budget_include_expenses'];
        $proj['fee'] =  $data['fee'];
        $proj['notes'] =  $data['notes'];
        $proj['starts_on'] =  $data['starts_on'];
        $proj['ends_on'] =  $data['ends_on'];
        $proj['over_budget_notification_date'] =  $data['over_budget_notification_date'];
        $proj['external_client_id']= array_get($data, 'client.id');
        $proj['client_id'] = array_get($data, 'client.id');
        $project->updateOrCreate(['external_id' => $data['id']],$proj);
        return $project;
    }
}
