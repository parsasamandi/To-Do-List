<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\StudyDataTable;
use App\Http\Requests\StoreStudyRequest;
use App\Providers\Action;
use App\Models\ToDoList;

class StudyController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    public function show() {
        return view("study.list");
    }

    // DataTable to blade
    public function list() {

        $dataTable = new StudyDataTable();

        $vars['studyTable'] = $dataTable->html();
 
        return view('study.list', $vars);
    }

    public function studyTable(StudyDataTable $dataTable) {
        return $dataTable->render('study.list');
    }

    public function store(StoreStudyRequest $request) {
        // Id
        $id = $request->get('id');

        ToDoList::updateOrCreate(
            ['id' => $id],
            ['name' => $request->get('name'),'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone_number' => $request->get('phone_number')]
        );

        return $this->getAction($request->get('button_action'));
    }
    
    // Edit 
    public function edit(Request $request) {
        return $this->action->edit(ToDoList::class, $request->get('id'));
    }
    
    // Delete
    public function delete($id) {
        return $this->action->delete(ToDoList::class, $id);
    }
}
