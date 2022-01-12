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
use App\Model\UserBook;
use Han\Utils\Service;

class UserBookDao extends Service
{
    public function search(array $input, int $offset, int $limit)
    {
        $query = UserBook::query();

        if (array_has($input, 'id')) {
            $query->where('id', $input['id']);
        }

        if (array_has($input, 'user_id')) {
            $query->where('user_id', $input['user_id']);
        }

        if (array_has($input, 'book_id')) {
            $query->where('book_id', $input['book_id']);
        }

        if (array_has($input, 'status')) {
            $query->where('status', $input['status']);
        }

        $query->orderByDesc('id');

        return $this->factory->model->pagination($query, $offset, $limit);
    }

    public function first(int $id, bool $throw = false)
    {
        $model = UserBook::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }
}
