<?php

namespace App\DataTables;

use App\Models\SubCategoryModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($subcategory) {
                return '<img src="'.$subcategory->image.'" width="100px" height="100px">';
            })
            ->addColumn('category', function ($subcategory) {
                return $subcategory->category->name;
            })
            ->addColumn('action', function($subcategory){
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
                                <button type="button" class="dropdown-item edit-btn" data-id="'.$subcategory->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                            </li>
                           <li>
                    <button type="button" class="dropdown-item" onclick="confirmDelete('.$subcategory->id.')" >Delete</button>
                </li>
                          </ul>
                        </div>';
            })
            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    public function query(SubCategoryModel $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
        
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('subcategory-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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

    public function getColumns(): array
    {
        return [
            Column::computed('id')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),

            Column::make('name'),
            Column::make('key'),
            Column::make('category')->name('category.name'),
            Column::make('image'),
            Column::make('action'),
        ];
    }

    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
