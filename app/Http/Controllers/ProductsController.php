<?php

namespace App\Http\Controllers;

use App\DataGrids\ProductsDataGrid;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(ProductsDataGrid $dataGrid)
    {
        return $dataGrid->render('welcome');
    }
}
