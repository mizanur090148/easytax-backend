<?php

namespace App\Services;


class DropdownService
{
    /**
     * @param $modelName
     * @param array $where
     * @param array $select
     * @return mixed
     */
    public function dropdownData($modelName, $where = [], $select = [], $isMultiple = false)
    {
        // Load model class object
        $model = new $modelName();
        // select column
        if (count($select)) {
            $model = $model->select($select);
        } else {
            $model = $model->select('*');
        }
        // where
        if (count($where)) {
            if ($isMultiple) {
                $model = $model->whereIn($where);
            } else {
                $model = $model->where($where);
            }
        }
        $model = $model->orderBy('id', 'desc');

        return $model->get();
    }
}