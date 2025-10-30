<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\DataTables\ProductDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Providers\Action;
use App\Models\Product;

class ProductController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }
   
    // DataTable to blade
    public function list() {

        $dataTable = new ProductDataTable();

        // User Table
        $vars['productTable'] = $dataTable->html();
 
        return view('product.list', $vars);
    }

    // Get product
    public function productTable(ProductDataTable $dataTable) {
        return $dataTable->render('product.list');
    }

    // Store product
    public function store(Request $request) {
        // Id
        $id = $request->get('id');

        Product::updateOrCreate(
            ['id' => $id],
            ['name' => $request->get('name'),'price' => $request->get('price'),
            'description' => $request->get('description'),
            'status' => $request->get('status')]
        );

        return $this->getAction($request->get('button_action'));
    }

    // Export table
    public function export() {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    
    // Edit 
    public function edit(Request $request) {
        return $this->action->edit(Product::class, $request->get('id'));
    }
    
    // Delete
    public function delete($id) {
        return $this->action->delete(Product::class, $id);
    }
}
