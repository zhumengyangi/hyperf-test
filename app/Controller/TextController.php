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
use App\Request\TextSaveRequest;
use App\Service\TextService;
use Hyperf\Di\Annotation\Inject;

class TextController extends Controller
{
    #[Inject]
    protected TextService $service;

    public function index(PaginationRequest $page)
    {
        $input = $this->request->all();
        [$count, $result] = $this->service->search($input, $page->offset(), $page->limit());

        return $this->response->success([
            'count' => $count,
            'list' => $result,
        ]);
    }

    public function save(int $id, TextSaveRequest $request)
    {
        $input = $request->all();
        $result = $this->service->save($id, $input);

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
