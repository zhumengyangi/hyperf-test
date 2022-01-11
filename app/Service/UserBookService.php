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

use App\Service\Dao\UserBookDao;
use App\Service\Formatter\UserBookFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class UserBookService extends Service
{
    #[Inject]
    protected UserBookDao $dao;

    #[Inject]
    protected UserBookFormatter $formatter;

    public function search(array $input, int $offset, int $limit)
    {
        [$count, $result] = $this->dao->search($input, $offset, $limit);

        $result = $this->formatter->formatDetail($result);
        var_dump(array_merge($result));exit;
        return [$count, $result];
    }
}
