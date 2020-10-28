<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const CARD = 0;
    public const CASH = 1;

    public const PROCESSING = 0;
    public const PAID = 1;
    public const DELIVERING = 2;
    public const DONE = 3;
    public const DENIED = 4;

    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
