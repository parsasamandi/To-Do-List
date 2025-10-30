<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\DataTables\AdminDataTable;
use App\Http\Requests\StoreUserRequest;
use App\Providers\Action;
use App\Models\User;

class AdminController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }
    
    // Admin page
    public function show() {
        return view('admin.home');
    }

    // DataTable to blade
    public function list() {

        $dataTable = new AdminDataTable();

        // User Table
        $vars['adminTable'] = $dataTable->html();
 
        return view('admin.list', $vars);
    }

    // Get user
    public function adminTable(AdminDataTable $dataTable) {
        return $dataTable->render('admin.list');
    }

    // Store user
    public function store(StoreUserRequest $request) {
        // Id
        $id = $request->get('id');

        User::updateOrCreate(
            ['id' => $id],
            ['name' => $request->get('name'),'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone_number' => $request->get('phone_number')]
        );

        return $this->getAction($request->get('button_action'));
    }
    
    // Edit 
    public function edit(Request $request) {
        return $this->action->edit(User::class, $request->get('id'));
    }
    
    // Delete
    public function delete($id) {
        return $this->action->delete(User::class, $id);
    }
}
