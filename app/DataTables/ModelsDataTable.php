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
            return !empty($model->image) ? '<img src="' . htmlspecialchars($model->image, ENT_QUOTES, 'UTF-8') . '" width="100px" height="100px">' : 'No image';
        })
        ->editColumn('subimage', function ($model) {
            $subimageone = !empty($model->subimageone) ? '<img src="' . htmlspecialchars($model->subimageone, ENT_QUOTES, 'UTF-8') . '" width="50px" height="50px" class="mb-3">' : 'No image';
            $subimagetwo = !empty($model->subimagetwo) ? '<img src="' . htmlspecialchars($model->subimagetwo, ENT_QUOTES, 'UTF-8') . '" width="50px" height="50px">' : 'No image';
            return $subimageone . ' ' . $subimagetwo;
        })
        ->editColumn('materialone', function ($model) {
            return !empty($model->materialone) ? '<img src="' . htmlspecialchars($model->materialone, ENT_QUOTES, 'UTF-8') . '" width="20px" height="20px">' : 'No image';
        })
        ->editColumn('materialtwo', function ($model) {
            return !empty($model->materialtwo) ? '<img src="' . htmlspecialchars($model->materialtwo, ENT_QUOTES, 'UTF-8') . '" width="20px" height="20px">' : 'No image';
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

                            <li>
                                <button type="button" class="dropdown-item edit-btn" data-id="'.$model->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                            </li>
                             <li>
                    <button type="button" class="dropdown-item" onclick="confirmDelete('.$model->id.')" >Delete</button>
                </li>
                          </ul>
                        </div>';
            })

            ->rawColumns(['image', 'subimage', 'subimagetwo', 'action','materialtwo','materialone','action'])
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
            Column::make('subimage')->computed('subimage'),
            Column::make('title'),
            Column::make('materialone'),
            Column::make('materialtwo'),
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
