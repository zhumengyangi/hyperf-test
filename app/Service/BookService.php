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

use App\Model\Book;
use App\Service\Dao\BookDao;
use App\Service\Formatter\BookFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class BookService extends Service
{
    #[Inject]
    protected BookDao $dao;

    #[Inject]
    protected BookFormatter $formatter;

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
            $model = new Book();
            $model->status = Book::STATUS_ONLINE;
        }

        $model->name = $input['name'];
        $model->title = $input['title'] ?? '';
        $model->code = $input['code'];
        $model->price = $input['price'];
        $model->author = $input['author'];
        $model->translate = $input['translate'] ?? '';
        $model->press = $input['press'];

        return $model->save();
    }

    public function status(int $id, int $status): bool
    {
        $model = $this->dao->first($id, true);
        $model->status = $status;
        return $model->save();
    }
}
