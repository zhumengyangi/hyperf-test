<?php

namespace App\Service\Dao;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\Fruit;
use Han\Utils\Service;

class FruitDao extends Service
{
    public function first(int $id, bool $throw): Fruit
    {
        $model = Fruit::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $input, int $offset, int $limit): array
    {
        $query = Fruit::query();
        if (array_has($input, 'id')) {
            $query->where('id', $query);
        }

        if (array_has($input, 'title')) {
            $query->where('title', 'like', '%' . $input['title'] . '%');
        }

        if (array_has($input, 'content')) {
            $query->where('content', 'like', '%' . $input['content'] . '%');
        }

        $query->orderByDesc('id');

        return $this->factory->model->pagination($query, $offset, $limit);
    }
}