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

use App\Model\Book;
use Han\Utils\Service;

class BookFormatter extends Service
{
    public function base(Book $model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'title' => $model->title,
            'code' => $model->code,
            'price' => $model->price,
            'author' => $model->author,
            'translate' => $model->translate,
            'press' => $model->price,
            'status' => $model->status,
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
