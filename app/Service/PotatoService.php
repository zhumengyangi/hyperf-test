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

use App\Model\Potato;
use App\Service\Dao\PotatoDao;
use App\Service\Formatter\PotatoFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class PotatoService extends Service
{
    #[Inject]
    protected PotatoDao $dao;

    #[Inject]
    protected PotatoFormatter $formatter;

    public function search(array $input, int $offset, int $limit): array
    {
        [$count, $result] = $this->dao->search($input, $offset, $limit);
        $result = $this->formatter->formatList($result);
        return [$count, $result];
    }

    public function save(int $id, array $input): bool
    {
        if ($id > 0) {
            $model = $this->dao->first($id, true);
        } else {
            $model = new Potato();
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
