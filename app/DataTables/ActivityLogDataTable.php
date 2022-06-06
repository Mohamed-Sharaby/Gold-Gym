<?php

namespace App\DataTables;

use App\Models\ActivityLog;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ActivityLogDataTable extends DataTable
{
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
            ->addColumn('action', 'dashboard.activity-logs.btn')
            ->addColumn('causer', function ($q) {
                return $q->causer->name ?? '';
            })

            ->addColumn('subject', function ($q) {
                return __(optional($q->subject)->modelName) ?? '';
            })
            ->addColumn('subject_id', function ($q) {
                return $q->subject->id ?? '';
            })
            ->addColumn('description', function ($q) {
                return __($q->description);
            })
            ->addColumn('created_at', function ($q) {
                return $q->created_at->toDateString();
            });
           // ->rawColumns(['status', 'created_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Activity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Activity::latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('activitylog-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                      //  Button::make('create'),
                         Button::make('export'),
                        Button::make('print'),
                      //  Button::make('reset'),
                      //  Button::make('reload')
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
            Column::make('id')->orderable(true)->title('#')->addClass('text-center'),
            Column::make('causer')->orderable(false)->title('المدير')->addClass('text-center'),
            Column::make('subject')->orderable(false)->title('القسم')->addClass('text-center'),
            Column::make('subject_id')->orderable(false)->title('رقم السجل الذى تمت عليه العملية')->addClass('text-center'),
            Column::make('description')->orderable(false)->title('العملية')->addClass('text-center'),
            Column::make('created_at')->orderable(true)->title('التاريخ')->addClass('text-center'),

            Column::computed('action')
                ->title('العمليات')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
//            Column::make('id'),
//            Column::make('add your columns'),
//            Column::make('created_at'),
//            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ActivityLog_' . date('YmdHis');
    }
}
