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

use App\Request\ChiliSaveRequest;
use App\Request\PaginationRequest;
use App\Service\ChiliService;
use Hyperf\Di\Annotation\Inject;

class ChiliController extends Controller
{
    #[Inject]
    protected ChiliService $service;

    public function index(PaginationRequest $page)
    {
        $params = $this->request->all();
        [$count, $list] = $this->service->search($params, $page->offset(), $page->limit());
        return $this->response->success([
            'count' => $count,
            'list' => $list,
        ]);
    }

    public function save(int $id, ChiliSaveRequest $request)
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
