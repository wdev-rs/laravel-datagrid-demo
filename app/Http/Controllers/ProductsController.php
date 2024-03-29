<?php

namespace App\Http\Controllers;

use App\DataGrids\ProductsDataGrid;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(ProductsDataGrid $dataGrid)
    {
        return redirect(route('datagrid'));
    }

    public function gridjs(ProductsDataGrid $dataGrid)
    {
        return $dataGrid->render('laravel-datagrid::datagrid-gridjs');
    }

    public function edit(Product $product)
    {
        return 'Edit page for product id='.$product->id;
    }

    public function datagrid(ProductsDataGrid $dataGrid)
    {
        return $dataGrid->render('laravel-datagrid::datagrid');
    }
}
