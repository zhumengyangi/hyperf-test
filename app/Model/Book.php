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
namespace App\Model;

/**
 * @property int $id
 * @property string $name 名称
 * @property string $title 简介
 * @property string $code 商品编码
 * @property int $price 定价
 * @property string $author 原著
 * @property string $translate 翻译
 * @property string $press 出版社
 * @property int $status 1正常 2删除
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Book extends Model
{
    // 正常
    public const STATUS_ONLINE = 1;

    // 删除
    public const STATUS_OFFLINE = 2;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'book';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'title', 'code', 'price', 'author', 'translate', 'press', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'price' => 'integer', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
