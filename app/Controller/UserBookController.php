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

use App\Request\PaginationRequest;
use App\Request\UserBookIndexRequest;
use App\Service\UserBookService;
use Hyperf\Di\Annotation\Inject;

class UserBookController extends Controller
{
    #[Inject]
    protected UserBookService $service;

    public function index(UserBookIndexRequest $request, PaginationRequest $page)
    {
        [$count, $list] = $this->service->search($request->all(), $page->offset(), $page->limit());
        return $this->response->success($list);
        return $this->response->success([
            'count' => $count,
            'list' => $list,
        ]);
    }
}
