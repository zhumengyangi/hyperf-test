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

use App\Model\Tomato;
use Han\Utils\Service;

class TomatoFormatter extends Service
{
    public function base(Tomato $model): array
    {
        return [
            'id' => $model->id,
            'title' => $model->title,
            'content' => $model->content,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString(),
        ];
    }

    public function formatList($models): array
    {
        $result = [];
        /** @var Tomato $model */
        foreach ($models as $model) {
            $result[] = $this->base($model);
        }
        return $result;
    }
}
