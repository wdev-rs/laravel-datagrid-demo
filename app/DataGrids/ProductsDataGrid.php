<?php


namespace App\DataGrids;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use WdevRs\LaravelDatagrid\DataGrid\DataGrid;

class ProductsDataGrid extends DataGrid
{

    /**
     * CategoriesDataGrid constructor.
     */
    public function __construct()
    {
        $this->fromQuery(Product::query())
            ->column('id', 'ID', null, 50)
            ->column('name', 'Name', function ($product) {
                return view('actions.edit_link', ['model' => $product])->render();
            }, 500)
            ->column('code', 'Code', null, 120)
            ->column(
                'status',
                'Status',
                null,
                70
            )
            ->column(
                'updated_at',
                'Updated at',
                fn (Product $product) => $product->updated_at->format('Y-m-d H:i:s'),
                150
            )
            ->column('sort_order', 'Sort order', null, 100);
    }

    public function search(?string $search): DataGrid
    {
        parent::search($search);

        $filters = collect(request()->get('filters'));

        $name = $filters->get('name');
        $code = $filters->get('code');

        $this->dataSource->query->when($name, fn ($query) => $query->where('name', 'like', '%'.$name.'%'));
        $this->dataSource->query->when($code, fn ($query) => $query->where('code', 'like', $code.'%'));

        return $this;
    }
}
