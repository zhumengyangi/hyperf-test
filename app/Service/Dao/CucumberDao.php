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
use App\Model\Cucumber;
use Han\Utils\Service;

class CucumberDao extends Service
{
    public function first(int $id, bool $throw = false): Cucumber
    {
        $model = Cucumber::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $params, int $offset, int $limit): array
    {
        $query = Cucumber::query();
        if (array_has($params, 'id')) {
            $query->where('id', $params['id']);
        }

        if (array_has($params, 'title')) {
            $query->where('title', 'like', '%' . $params['title'] . '%');
        }

        if (array_has($params, 'content')) {
            $query->where('content', 'like', '%' . $params['content'] . '%');
        }

        $query->orderByDesc('id');

        return $this->factory->model->pagination($query, $offset, $limit);
    }
}
