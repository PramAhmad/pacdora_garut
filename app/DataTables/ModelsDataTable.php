<?php

namespace App\DataTables;

use App\Models\Model;
use App\Models\Models;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ModelsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($model) {
                return '<img src="'.$model->image.'" width="100px" height="100px">';
            })
            ->editColumn('subimage', function ($model) {
                return '<img src="'.$model->subimageone .' " width="50px" height="50px" class="mb-3"> <img src="'.$model->subimagetwo.'" width="50px" height="50px">';
            })
            ->editColumn('board', function ($model) {
                return $model->white_board == "ya" ? '<span class="badge font-medium bg-light-primary text-primary">Yes</span>' : '<span class="badge font-medium bg-light-danger text-danger">No</span>';
            })
            ->editColumn('flute', function ($model) {
                return $model->flute == "ya" ? '<span class="badge font-medium bg-light-primary text-primary">Yes</span>' : '<span class="badge font-medium bg-light-danger text-danger">No</span>';
            })
            ->editColumn('sub_category', function ($model) {
                return $model->subcategory->name;
            })
            ->editColumn('action', function ($model) {
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
                            <li><a class="dropdown-item" href="/model/show/'.$model->id.'">Detail</a></li>
                            <li>
                                <button type="button" class="dropdown-item edit-btn" data-id="'.$model->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                            </li>
                            <li>
                              <form action="/model/delete/'.$model->id.'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="dropdown-item">Delete</button>
                              </form>
                            </li>
                          </ul>
                        </div>';
            })

            ->rawColumns(['image', 'subimage', 'subimagetwo', 'action','flute','board','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Models $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('model-table')
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
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('image'),
            Column::make('subimage'),
            Column::make('title'),
            Column::make('board'),
            Column::make('flute'),
            Column::make('model'),
            Column::computed('action')
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
        return 'Models_' . date('YmdHis');
    }
}
