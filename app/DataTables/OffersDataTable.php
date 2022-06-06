<?php

namespace App\DataTables;

use App\Models\Offer;
use App\Models\Service;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OffersDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.offers.btn')
            ->addColumn('discount', function ($q) {
                return $q->discount;
            })
            ->addColumn('start_date', function ($q) {
                return $q->start_date->toDateString();
            })
            ->addColumn('end_date', function ($q) {
                return $q->end_date->toDateString();
            })
            ->rawColumns(['status', 'created_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Offer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Service::whereIsOffer(1)->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('offers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
            // Button::make('create'),
               Button::make('export'),
                Button::make('print'),
            //  Button::make('reset'),
            //   Button::make('reload')
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
            Column::make('discount')->orderable(false)->title('نسبة الخصم')->addClass('text-center'),
            Column::make('start_date')->orderable(false)->title('تاريخ بداية العرض')->addClass('text-center'),
            Column::make('end_date')->orderable(false)->title('تاريخ نهاية العرض')->addClass('text-center'),

            Column::computed('action')
                ->title('العمليات')
                ->exportable(false)
                ->printable(false)
                ->width(350)
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
        return 'Offers_' . date('YmdHis');
    }
}
