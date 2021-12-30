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
use App\Model\Potato;
use Han\Utils\Service;

class PotatoDao extends Service
{
    public function first(int $id, bool $throw = false): Potato
    {
        $model = Potato::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $input, int $offset, int $limit): array
    {
        $query = Potato::query();
        if (isset($input['id']) && ! empty($input['id'])) {
            $query->where('id', $input['id']);
        }

        if (isset($input['title']) && ! empty($input['title'])) {
            $query->where('title', 'like', '%' . $input['title'] . '%');
        }

        if (isset($input['content']) && ! empty($input['content'])) {
            $query->where('content', 'like', '%' . $input['content'] . '%');
        }

        $query->orderByDesc('created_at');

        return $this->factory->model->pagination($query, $offset, $limit);
    }
}
