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
 * @property int $user_id 用户id
 * @property int $book_id 图书id
 * @property int $begin_time 借书时间
 * @property int $end_time 还书时间
 * @property int $status 1已借出 2已归还
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Book $book
 */
class UserBook extends Model
{
    // 借
    public const STATUS_BORROW = 1;

    // 还
    public const STATUS_STILL = 2;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_book';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'book_id', 'begin_time', 'end_time', 'status', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'book_id' => 'integer', 'begin_time' => 'integer', 'end_time' => 'integer', 'status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
