<?php

namespace App\DataTables;

use App\Models\Template;
use App\Models\TemplateUser;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TemplateUserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
      return (new EloquentDataTable($query))
      ->editColumn('image', function ($template) {
          return '<img src="/upload/temp/' . $template->image . '" width="400px" height="100%">';
      })
      ->editColumn('action', function($template){
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
                      <button type="button" class="dropdown-item edit-btn" data-id="'.$template->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                  </li>
                <li>
                    <button type="button" class="dropdown-item" onclick="confirmDelete('.$template->id.')" >Delete</button>
                </li>

              </ul>
          </div>';
      })
      ->editColumn('created_at', function ($template) {
          return $template->created_at->format('d F Y');
      })
        ->editColumn('no', function () {
            static $no = 1;
            return $no++;
        })
      ->rawColumns(['action', 'image','no'])
      ->setRowId('id');
  
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Template $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('id')
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
            Column::computed('no')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('image'),
            Column::make('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
           
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TemplateUser_' . date('YmdHis');
    }
}
