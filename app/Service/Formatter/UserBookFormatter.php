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
namespace App\Service\Formatter;

use App\Model\UserBook;
use Han\Utils\Service;

class UserBookFormatter extends Service
{
    public function base(UserBook $model): array
    {
        return [
            'id' => $model->id,
            'user_id' => $model->user_id,
            'book_id' => $model->book_id,
            'begin_time' => $model->begin_time,
            'end_time' => $model->end_time,
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

    public function formatDetail($models)
    {
        $result = [];
        foreach ($models as $key => $model) {
            $result[$key] = $this->base($model);
            $result[$key]['user'] = $model->book->toArray();
        }
        return $result;
    }
}
