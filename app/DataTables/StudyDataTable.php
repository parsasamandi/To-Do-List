<?php

namespace App\DataTables;

use App\Models\Task;
use App\Datatables\GeneralDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class StudyDataTable extends DataTable
{
    public $dataTable;

    public function __construct() {
        $this->dataTable = new GeneralDataTable();
    }
    
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->addColumn('priority', function (Task $task) {
                $labels = [
                    0 => 'Low',
                    1 => 'Medium',
                    2 => 'High'
                ];
                return $labels[$task->priority] ?? 'Unknown';
            })
            ->addColumn('status', function (Task $task) {
                $labels = [
                    0 => 'Pending',
                    1 => 'In Progress',
                    2 => 'Completed'
                ];
                return $labels[$task->status] ?? 'Unknown';
            })
            ->addColumn('action', function (Task $task) {
                return $this->dataTable->setAction($task->id);
            });

    }
    
    /**
     * Get query source of dataTable.
     *
     * @param Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->dataTable->tableSetting(
            $this->builder(), 
            $this->getColumns(), 
            'study'
        );
    }
    
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            $this->dataTable->getIndexCol(),
            Column::make('name')->title('Name'),
            Column::make('tag')->title('Tag'),
            Column::make('priority')->title('Priority'),
            Column::make('due_date')->title('Due date'),
            Column::make('status')->title('Status'),
            $this->dataTable->setActionCol('| Edit')
        ];
    }
}
