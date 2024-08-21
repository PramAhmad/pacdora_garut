<?php

namespace App\DataTables;

use App\Models\Umkm;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\WithExportQueue;

class UmkmDataTable extends DataTable
{
  use WithExportQueue;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
           
            ->editColumn('user_id', function ($umkm) {
                return $umkm->user->name;
            })

            ->editColumn('approved', function ($umkm) {
              return $umkm->approved ? 
                  '<span class="badge font-medium bg-light-primary text-primary">Approved</span>' : 
                  '<span class="badge font-medium bg-light-danger text-danger">Not Approved</span>';
          })
          ->editColumn('action', function($umkm){
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
                        <li><a class="dropdown-item" href="/admin/umkm/show/'.$umkm->id.'">Detail</a></li>
                        <li><a class="dropdown-item" href="/admin/umkm/edit/'.$umkm->id.'">Edit</a></li>
                        <li>
                          <form action="/admin/umkm/delete/'.$umkm->id.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="dropdown-item">Delete</button>
                          </form>
                        </li>
                      </ul>
                    </div>';
        })
        
          
            ->setRowId('id')
            ->rawColumns(['action','approved']);

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Umkm $model): QueryBuilder
    {
        return $model->newQuery()->where('approved', "!=", 2);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('umkm')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->searching()
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
                  ->exportable(true)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center w-full '),
              
                Column::make('user_id'),
                Column::make('nik'),
                Column::make('nohp'),
                Column::make('approved'),
                Column::make('action')->exportable(false)->printable(false)->width(100)->addClass('text-center w-full '),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Umkm_' . date('YmdHis');
    }
}
