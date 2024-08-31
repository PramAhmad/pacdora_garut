<?php

namespace App\DataTables;

use App\Models\BestDesain;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use PHPUnit\Framework\Constraint\Count;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BestDesainDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('nama_model', function ($bestdesain) {
                return $bestdesain->model->title;
            })
            ->editColumn('gambar', function ($bestdesain) {
                return '<img src="' . htmlspecialchars($bestdesain->model->image, ENT_QUOTES, 'UTF-8') . '" width="100px" height="100px">';
            })
            ->editColumn('category', function ($bestdesain) {
                return $bestdesain->model->subcategory->name;
            })
            ->editColumn('action', function ($bestdesain) {
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
                                <button type="button" class="dropdown-item edit-btn" data-id="'.$bestdesain->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item delete-btn" data-id="'.$bestdesain->id.'">Delete</button>
                            </li>
                          </ul>
                        </div>';
            })
            ->rawColumns(['gambar','nama_model','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BestDesain $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bestdesain-table')
                    ->columns($this->getColumns())
          
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
                  ->searchable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('nama_model'),
            Column::make('gambar'),
            Column::make('category'),
            Column::make('urutan'),
            Column::make('action')
       
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BestDesain_' . date('YmdHis');
    }
}
