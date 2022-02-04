<?php

namespace App\Repositories\Auth;

use App\Models\Auth\Plan;
use Illuminate\Support\Facades\Schema;

class PlanRepository
{
    public function Create(array $inputs)
    {
        return Plan::query()->create([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'data' => $inputs['data'],
        ]);
    }

    public function Update($plan_id, array $inputs)
    {
        $plan = $this->Find($plan_id);

        if (!$plan) {
            return null;
        }

        $name = $inputs['name'] ?? null;
        $description = $inputs['description'] ?? null;
        $data = $inputs['data'] ?? null;


        if (!$name && !$description && !$data) {
            return $plan;
        }

        if ($name) $plan->name = $name;
        if ($description) $plan->description = $description;
        if ($data) $plan->data = $data;

        $plan->save();

        return $plan;
    }

    public function Find($plan_id)
    {
        return Plan::query()->where('id', $plan_id)->first();
    }

    public function Delete($plan_id)
    {
        $toBeDeletedPlan = $this->Find($plan_id);

        if (!$toBeDeletedPlan) {
            return null;
        }

        try {
            $toBeDeletedPlan->delete();
            return [
                'result' => 'true'
            ];
        } catch (\Exception $ex){
            return false;
        }
    }

    public function FindAll($needle, $page, $limit)
    {
        $columns = Schema::getColumnListing('plans');

        return Plan::query()->where(function ($query) use ($needle, $columns) {
            foreach ($columns as $column) {
                $query->orWhere("plans.$column", 'LIKE', "%$needle%");
            }
        })->paginate($limit, ['*'], 'page', $page);
    }
}