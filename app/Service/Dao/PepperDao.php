<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Service\Dao;

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\Pepper;
use Han\Utils\Service;

class PepperDao extends Service
{
    public function first(int $id, bool $throw = false): Pepper
    {
        $model = Pepper::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $input, int $offset, int $limit): array
    {
        $query = Pepper::query();
        if (array_has($input, 'id')) {
            $query->where('id', $input['id']);
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
