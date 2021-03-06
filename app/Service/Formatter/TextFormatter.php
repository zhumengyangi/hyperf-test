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

use App\Model\Text;
use Han\Utils\Service;

class TextFormatter extends Service
{
    public function base(Text $model)
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
        /** @var Text $model */
        foreach ($models as $model) {
            $result[] = $this->base($model);
        }
        return $result;
    }
}
