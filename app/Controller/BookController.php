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
namespace App\Controller;

use App\Request\BookSaveRequest;
use App\Request\BookStatusRequest;
use App\Request\PaginationRequest;
use App\Service\BookService;
use Hyperf\Di\Annotation\Inject;

class BookController extends Controller
{
    #[Inject]
    protected BookService $service;

    public function index(PaginationRequest $page)
    {
        $params = $this->request->all();
        [$count, $list] = $this->service->search($params, $page->offset(), $page->limit());
        return $this->response->success([
            'count' => $count,
            'list' => $list,
        ]);
    }

    public function save(int $id, BookSaveRequest $request)
    {
        $result = $this->service->save($id, $request->all());
        return $this->response->success([
            'updated' => $result,
        ]);
    }

    public function status(int $id, BookStatusRequest $request)
    {
        $result = $this->service->status($id, $request->status());
        return $this->response->success([
            'updated' => $result,
        ]);
    }
}
