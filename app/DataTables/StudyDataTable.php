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
                return $labels[$task->priority];
            }) 
            ->orderColumn('priority', function ($query, $order) {
                $query->orderBy('priority', $order);
            })
            ->addColumn('status', function (Task $task) {
                $labels = [
                    0 => 'Pending',
                    1 => 'In Progress',
                    2 => 'Completed'
                ];
                return $labels[$task->status];
            })->orderColumn('status', function ($query, $order) {
                $query->orderBy('status', $order);
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
            Column::make('name')->title('Name')->orderable(false)->searcable(true),
            Column::make('tag')->title('Tag')->orderable(false),
            Column::make('priority')->title('Priority'),
            Column::make('due_date')->title('Due date')->orderable(false),
            Column::make('status')->title('Status')->orderable(true),
            $this->dataTable->setActionCol('| Edit')
        ];
    }
}
