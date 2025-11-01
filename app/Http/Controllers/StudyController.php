<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\StudyDataTable;
use App\Http\Requests\StoreStudyRequest;
use App\Providers\Action;
use App\Models\Task;

class StudyController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    // Show the main study list page
    public function show() {
        return view("study.list");
    }

    // Render DataTable to Blade view
    public function list() {
        $dataTable = new StudyDataTable();
        $vars['studyTable'] = $dataTable->html();

        return view('study.list', $vars);
    }

    // Render DataTable
    public function studyTable(StudyDataTable $dataTable) {
        return $dataTable->render('study.list');
    }

    // Store or update a task
    public function store(StoreStudyRequest $request) {
        $id = $request->get('id');

        Task::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->get('name'),
                'tag' => $request->get('tag'),
                'priority' => $request->get('priority', 1),
                'status' => $request->get('status', 0),
                'due_date' => $request->get('due_date'),
            ]
        );

        // Call the action based on button_action
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
