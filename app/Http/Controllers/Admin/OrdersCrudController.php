<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCrudRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\OrderCrudRequest;
use App\Http\Requests\ProductCrudRequest;
use App\Order;
use App\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrdersCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        $this->crud->setModel(Order::class);
        $this->crud->setEntityNameStrings('Заказ', 'Заказы');
        $this->crud->setRoute(backpack_url('orders'));
        $this->crud->denyAccess('create');
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'products',
                'label' => 'Товары',
                'type' => 'model_function',
                'function_name' => 'orderedProducts',
                'limit' => 1000,
            ],
            [
                'name' => 'fio',
                'label' => 'ФИО',
                'type' => 'text',
            ],
            [
                'name' => 'phone',
                'label' => 'Телефон',
                'type' => 'text',
            ],
            [
                'name' => 'email',
                'label' => 'Почта',
                'type' => 'text',
            ],
            [
                'name' => 'address',
                'label' => 'Адрес',
                'type' => 'text',
            ],
            [
                'name' => 'time',
                'label' => 'Время доставки',
                'type' => 'model_function',
                'function_name' => 'timeOfDelivering',
                'limit' => 1000,
            ],
            [
                'name' => 'payment_method',
                'label' => 'Оплата',
                'type' => 'model_function',
                'function_name' => 'paymentMethod',
                'limit' => 1000,
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'model_function',
                'function_name' => 'orderStatus',
                'limit' => 1000,
            ],
        ]);
    }

    public function setupCreateOperation()
    {
        $this->addCategoryFields();
        $this->crud->setValidation(OrderCrudRequest::class);
    }

    public function setupUpdateOperation()
    {
        $this->addCategoryFields();
        $this->crud->setValidation(OrderCrudRequest::class);
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitStore();
    }

    /**
     * Update the specified resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }

    protected function addCategoryFields()
    {
        $this->crud->addFields([
            [
                'name'  => 'status',
                'label' => 'Статус',
                'type'  => 'select_from_array',
                'options' => [Order::PROCESSING => 'Обрабатывается', Order::PAID => 'Оплачено', Order::DELIVERING => 'Доставляется', Order::DONE => 'Выполнено', Order::DENIED => 'Отменено'],
                'allows_null' => false,
                'default'     => 'Обрабатывается',
            ],
        ]);
    }
}
