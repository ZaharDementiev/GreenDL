<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait;

    public const CARD = 0;
    public const CASH = 1;

    public const PROCESSING = 0;
    public const PAID = 1;
    public const DELIVERING = 2;
    public const DONE = 3;
    public const DENIED = 4;

    protected $fillable = ['status'];

    public function product() {
        return $this->belongsToMany(Product::class);
    }

    public function paymentMethod() {
        if ($this->payment_method == Order::CARD) {
            return "Картой";
        } else {
            return "Наличка";
        }
    }

    public function orderStatus() {
        if ($this->status == Order::PROCESSING) {
            return "Обрабатывается";
        } elseif ($this->status == Order::PAID) {
            return "Оплачено";
        } elseif ($this->status == Order::DELIVERING) {
            return "Доставляется";
        } elseif ($this->status == Order::DONE) {
            return "Выполнено";
        } else {
            return "Отменено";
        }
    }

    public function orderedProducts() {
        $products = Order::where('id', $this->id)->first()->product->groupBy('id');
        $finalOrder = null;
        foreach ($products as $item) {
            $finalOrder .= "<a target='_blank' href=/catalog/" . $item[0]->slug . ">" .$item[0]->slug . '(' . $item->count() . ') </a>';
        }
        return $finalOrder;
    }

    public function timeOfDelivering() {
        return 'День: ' . $this->day_of_delivery . ', время:' . $this->time_of_delivery;
    }
}
