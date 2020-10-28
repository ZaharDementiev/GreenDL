<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryCrudRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductCrudRequest;
use App\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductsCrudController extends CrudController
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
        $this->crud->setModel(Product::class);
        $this->crud->setEntityNameStrings('Продукт', 'Продукты');
        $this->crud->setRoute(backpack_url('products'));
    }

    public function setupListOperation()
    {
        $this->crud->setColumns([
            [
                'name' => 'title',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'text',
            ],
            [
                'name' => 'price',
                'label' => 'Цена',
                'type' => 'number',
            ],
            [
                'name' => 'taste',
                'label' => 'Вкус',
                'type' => 'text',
            ],
            [
                'name' => 'sales',
                'label' => 'Продажи',
                'type' => 'number',
            ],
            [
                'name' => 'available',
                'label' => 'В наличии',
                'type' => 'boolean',
                'options' => [0 => 'Нет', 1 => 'Да'],
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'height' => '30px',
                'width'  => '30px',
            ],
        ]);
    }

    public function setupCreateOperation()
    {
        $this->addCategoryFields();
        $this->crud->setValidation(ProductCrudRequest::class);
    }

    public function setupUpdateOperation()
    {
        $this->addCategoryFields();
        $this->crud->setValidation(ProductCrudRequest::class);
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
                'name' => 'title',
                'label' => 'Название',
                'type' => 'text',
            ],
            [
                'name' => 'description',
                'label' => 'Описание',
                'type' => 'text',
            ],
            [
                'name' => 'price',
                'label' => 'Цена',
                'type' => 'number',
            ],
            [
                'name' => 'taste',
                'label' => 'Вкус',
                'type' => 'text',
            ],
            [
                'name' => 'sales',
                'label' => 'Продажи',
                'type' => 'number',
            ],
            [
                'name' => 'slug',
                'label' => 'ссылка',
                'type' => 'text',
            ],
            [
                'name' => 'available',
                'label' => 'В наличии',
                'type' => 'boolean',
                'options' => [0 => 'Нет', 1 => 'Да'],
            ],
            [
                'name' => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'height' => '30px',
                'width'  => '30px',
            ],
        ]);
    }
}
