<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function orderFoody(){
        return $this->hasMany(OrderFoody::class);
    }
    public function orderStatus(){
        return $this->hasOne(OrderStatus::class);
    }
    public function amountOrderFoody(){
        return OrderFoody::where('order_id',$this->id)->count();
    }
    public function orderDetails() {
        return $this->hasMany(OrderFoody::class);
    }
    public function getStatus(){
        return $this->orderStatus->status;
    }
    public function paymentType() {
        $payment = [
            0 => 'Tiền mặt',
            1 => 'Cổng Ngân Lượng',
            2 => 'Thẻ tín dụng / ATM'
        ];
        return $payment[$this->payment_type];
    }
    public function getStatusText() {
        $status = [
            0 => 'Chưa duyệt',
            1 => 'Đang vận chuyển',
            2 => 'Đã giao hàng'
        ];
        return $status[$this->orderStatus->status];
    }
    public function unapproved(){
        return $this->orderStatus->status == 0;
    }
    public function approved(){
        return $this->orderStatus->status == 1 || $this->orderStatus->status == 2;
    }
    public function cancelled(){
        return $this->orderStatus->status == 3;
    }

    public function getIdAdmin(){
        return $this->orderStatus->admin_id;
    }
    public function personApproved()
    {
        return (empty($this->orderStatus->admin_id)?'':($this->getName()));
    }
}
