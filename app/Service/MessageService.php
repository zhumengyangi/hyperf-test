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
namespace App\Service;

use App\Model\Message;
use App\Service\Dao\MessageDao;
use App\Service\Formatter\MessageFormatter;
use Han;
use Hyperf\Di\Annotation\Inject;

class MessageService extends Han\Utils\Service
{
    #[Inject]
    protected MessageDao $dao;

    #[Inject]
    protected MessageFormatter $formatter;

    public function search(array $input, int $offset, int $limit): array
    {
        [$count, $models] = $this->dao->search($input, $offset, $limit);
        $result = $this->formatter->formatList($models);

        return [$count, $result];
    }

    public function save(int $id, array $params): bool
    {
        if ($id > 0) {
            $model = $this->dao->first($id, true);
        } else {
            $model = new Message();
        }
        $model->title = $params['title'];
        $model->content = $params['content'];

        return $model->save();
    }

    public function delete(int $id): bool
    {
        $model = $this->dao->first($id, true);
        return $model->delete();
    }
}
