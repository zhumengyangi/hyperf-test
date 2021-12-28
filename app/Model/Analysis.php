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
 * @property int $activate_rate
 * @property int $activate_uv
 * @property int $activate_device
 * @property int $click_pv
 * @property int $click_uv
 * @property int $total_activate_device
 * @property string $day
 * @property string $first_register_device
 * @property string $first_pay_device
 * @property int $view_pv
 * @property int $view_uv
 * @property string $click_rate
 * @property string $register
 * @property string $login
 * @property string $role
 * @property string $pay_device
 * @property string $amount
 * @property string $register_rate
 * @property string $click_buy_uv
 * @property string $amount_avg
 * @property string $pay_order_device
 * @property string $order_amount
 * @property string $os_name
 * @property string $m_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Analysis extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'analyses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'activate_rate', 'activate_uv', 'activate_device', 'click_pv', 'click_uv', 'total_activate_device', 'day', 'first_register_device', 'first_pay_device', 'view_pv', 'view_uv', 'click_rate', 'register', 'login', 'role', 'pay_device', 'amount', 'register_rate', 'click_buy_uv', 'amount_avg', 'pay_order_device', 'order_amount', 'os_name', 'm_name', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'activate_rate' => 'integer', 'activate_uv' => 'integer', 'activate_device' => 'integer', 'click_pv' => 'integer', 'click_uv' => 'integer', 'total_activate_device' => 'integer', 'view_pv' => 'integer', 'view_uv' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
