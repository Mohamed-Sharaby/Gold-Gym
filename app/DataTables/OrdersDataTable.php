<?php

namespace App\DataTables;

use App\Models\Order;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.orders.btn')
            ->addColumn('user.name', function ($q) {
                return $q->user->name;
            })
            ->addColumn('service.name', function ($q) {
                return $q->service->name;
            })
            ->addColumn('no_of_persons', function ($q) {
                return $q->no_of_persons;
            })
            ->addColumn('status', function ($q) {
                return __($q->status);
            })
            ->addColumn('total', function ($q) {
                return number_format($q->total, 2);
            })
            ->addColumn('created_at', function ($q) {
                return $q->created_at->toDateString();
            })
            ->rawColumns(['status', 'created_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        $orders = Order::query()->latest();
        $orders->when(\request('status'), function ($q) {
            $q->where('status', \request('status'));
        });
        $orders->when(\request('from') and \request('to'), function ($q) {
            $q->whereBetween('created_at', [\request('from'), Carbon::parse(\request('to'))->addDay()]);
        });
        return $orders;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
            //  Button::make('create'),
               Button::make('export'),
                Button::make('print'),
            //  Button::make('reset'),
            // Button::make('reload')
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
            Column::make('id')->orderable(true)->title('رقم الحجز')->addClass('text-center'),
            Column::make('user.name')->orderable(false)->title('العميل')->addClass('text-center'),
            Column::make('service.name')->orderable(false)->title('اسم الخدمة')->addClass('text-center'),
            Column::make('no_of_persons')->orderable(false)->title('عدد الافراد')->addClass('text-center'),
            Column::make('status')->orderable(false)->title('الحالة')->addClass('text-center'),
            Column::make('total')->orderable(false)->title('اجمالى التكلفة')->addClass('text-center'),
            Column::make('created_at')->orderable(true)->title('تاريخ الطلب')->addClass('text-center'),

            Column::computed('action')
                ->title('العمليات')
                ->exportable(false)
                ->printable(false)
                ->width(120)
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
        return 'Orders_' . date('YmdHis');
    }
}
