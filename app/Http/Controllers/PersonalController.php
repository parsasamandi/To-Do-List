<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PersonalDataTable;
use App\Http\Requests\StorePersonalRequest;
use App\Providers\Action;
use App\Models\Task;

class PersonalController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    // Render DataTable to Blade view
    public function list() {
        $dataTable = new PersonalDataTable();
        $vars['personalTable'] = $dataTable->html();

        return view('personal.list', $vars);
    }

    // Render DataTable
    public function personalTable(PersonalDataTable $dataTable) {
        return $dataTable->render('personal.list');
    }

    // Store or update a personal task
    public function store(StorePersonalRequest $request) {
        $id = $request->get('id');

        Task::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->get('name'),
                'tag' => "personal", // changed from "study"
                'priority' => $request->get('priority', 1),
                'status' => $request->get('status', 0),
                'due_date' => $request->get('due_date'),
            ]
        );

        return $this->getAction($request->get('action'));
    }
    
    // Edit task
    public function edit(Request $request) {
        return $this->action->edit(Task::class, $request->get('id'));
    }
    
    // Delete task
    public function delete($id) {
        return $this->action->delete(Task::class, $id);
    }
}
