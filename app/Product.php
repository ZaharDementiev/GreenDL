<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;

    protected $table = 'products';
    protected $guarded = ['id'];

    public const PRODUCT_ON_PAGE = 12;
    public const KEY_OF_COOKIES = 'products';
    public const KEY_OF_ORDER = 'order';

    public function order() {
        return $this->belongsToMany(Order::class);
    }
}
