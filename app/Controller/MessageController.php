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

use App\Request\MessageSaveRequest;
use App\Request\PaginationRequest;
use App\Service\MessageService;
use Hyperf\Di\Annotation\Inject;

class MessageController extends Controller
{
    #[Inject]
    protected MessageService $service;

    /**
     * 列表.
     */
    public function index(PaginationRequest $page)
    {
        $params = $this->request->all();
        [$count, $list] = $this->service->search($params, $page->offset(), $page->limit());

        return $this->response->success([
            'count' => $count,
            'list' => $list,
        ]);
    }

    /**
     * 保存.
     */
    public function save(int $id, MessageSaveRequest $request)
    {
        $result = $this->service->save($id, $request->all());

        return $this->response->success([
            'updated' => $result,
        ]);
    }

    /**
     * 删除.
     */
    public function delete(int $id)
    {
        $result = $this->service->delete($id);

        return $this->response->success([
            'updated' => $result,
        ]);
    }
}
