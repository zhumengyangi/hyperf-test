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
use App\Model\Book;
use Han\Utils\Service;

class BookDao extends Service
{
    public function first(int $id, bool $throw = false): Book
    {
        $model = Book::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::TXT_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $input, int $offset, int $limit): array
    {
        $query = Book::query();
        if (array_has($input, 'id')) {
            $query->where('id', $input['id']);
        }

        if (array_has($input, 'name')) {
            $query->where('name', 'like', '%' . $input['name'] . '%');
        }

        if (array_has($input, 'author')) {
            $query->where('author', 'like', '%' . $input['author'] . '%');
        }

        if (array_has($input, 'press')) {
            $query->where('press', 'like', '%' . $input['press'] . '%');
        }

        if (array_has($input, 'status')) {
            $query->where('status', $input['status']);
        } else {
            $query->where('status', '<>', Book::STATUS_OFFLINE);
        }

        return $this->factory->model->pagination($query, $offset, $limit);
    }
}
