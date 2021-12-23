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
use App\Model\Message;
use Han\Utils\Service;

class MessageDao extends Service
{
    public function first(int $id, bool $throw = false): Message
    {
        $model = Message::findFromCache($id);
        if ($throw && empty($model)) {
            throw new BusinessException(ErrorCode::MESSAGE_NOT_EXITS);
        }
        return $model;
    }

    public function search(array $input, int $offset, int $limit): array
    {
        $query = Message::query();
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
