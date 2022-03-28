<?php

namespace App\Service\Formatter;

use App\Model\Fruit;
use Han\Utils\Service;

class FruitFormatter extends Service
{
    public function base(Fruit $model)
    {
        return [
            'id' => $model->id,
            'title' => $model->title,
            'content' => $model->content,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString(),
        ];
    }

    public function formatList($models)
    {
        $result = [];
        foreach ($models as $model) {
            $result[] = $this->base($model);
        }
        return $result;
    }

}