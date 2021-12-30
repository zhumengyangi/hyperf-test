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

use App\Model\Demo;
use App\Service\Dao\DemoDao;
use App\Service\Formatter\DemoFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class DemoService extends Service
{
    #[Inject]
    protected DemoDao $dao;

    #[Inject]
    protected DemoFormatter $formatter;

    public function search(array $input, int $offset, int $limit): array
    {
        [$count, $result] = $this->dao->search($input, $offset, $limit);
        $result = $this->formatter->formatList($result);
        return [$count, $result];
    }

    public function save(int $id, array $input): bool
    {
        if ($id <= 0) {
            $model = new Demo();
        } else {
            $model = $this->dao->first($id, true);
        }
        $model->title = $input['title'];
        $model->content = $input['content'];
        return $model->save();
    }

    public function del(int $id): bool
    {
        $model = $this->dao->first($id, true);
        return $model->delete();
    }
}
