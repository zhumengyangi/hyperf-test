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

use App\Model\UserBook;
use App\Service\Dao\UserBookDao;
use App\Service\Formatter\UserBookFormatter;
use Carbon\Carbon;
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
        return [$count, $result];
    }

    /**
     * @param $params [
     *  'user_id' => int,
     *  'book_id' => int,
     * ]
     */
    public function save(int $id, array $params): bool
    {
        $time = Carbon::now()->timestamp;

        if ($id > 0) {
            $model = $this->dao->first($id, true);
            $model->end_time = $time;
            $model->status = UserBook::STATUS_STILL;
        } else {
            $model = new UserBook();
            $model->user_id = $params['user_id'];
            $model->book_id = $params['book_id'];
            $model->begin_time = $time;
            $model->status = UserBook::STATUS_BORROW;
        }

        return $model->save();
    }
}
