<?php

namespace App\DataTables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('foto', function ($customer) {
          $imagePath = asset('upload/customer/' . $customer->foto);
          return '<img src="' . $imagePath . '" width="100px" height="100px">';
      })
      
        ->editColumn('action', function($customer){
            return '<div class="btn-group">
                      <button
                        class="btn btn-light-secondary text-secondary font-medium btn-sm dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        Actions
                      </button>
                      <ul class="dropdown-menu">
                      
                        <li>
                            <button type="button" class="dropdown-item edit-btn" data-id="'.$customer->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                        </li>
                        <li>
                          <form action="/customer/delete/'.$customer->id.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item">Delete</button>
                          </form>
                        </li>
                      </ul>
                    </div>';
        })
        ->rawColumns(['foto', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('customer-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('id')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('nama'),
            Column::make('foto'),
            Column::make('nama_usaha'),
            Column::make('isi'),
            Column::make('action'),
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }
}
