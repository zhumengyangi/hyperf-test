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
use App\Request\TagRequest;
use App\Service\TagService;
use Hyperf\Di\Annotation\Inject;

class TagController extends Controller
{
    #[Inject]
    protected TagService $service;

    public function index(PaginationRequest $page)
    {
        [$count, $result] = $this->service->search($this->request->all(), $page->offset(), $page->limit());

        return $this->response->success([
            'count' => $count,
            'list' => $result,
        ]);
    }

    public function save(int $id, TagRequest $request)
    {
        $result = $this->service->save($id, $request->all());

        return $this->response->success([
            'updated' => $result,
        ]);
    }

    public function del(int $id)
    {
        $result = $this->service->del($id);

        return $this->response->success([
            'updated' => $result,
        ]);
    }
}
