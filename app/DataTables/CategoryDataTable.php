<?php

namespace App\DataTables;

use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($category) {
                return '<img src="'.$category->image.'" width="100px" height="100px">';
            })
            ->addColumn('action', function($category){
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
                            <li><a class="dropdown-item" href="/category/show/'.$category->id.'">Detail</a></li>
                            <li>
                                <button type="button" class="dropdown-item edit-btn" data-id="'.$category->id.'" data-bs-toggle="modal" data-bs-target="#edit-modal">Edit</button>
                            </li>
                            <li>
                              <form action="/category/delete/'.$category->id.'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="dropdown-item">Delete</button>
                              </form>
                            </li>
                          </ul>
                        </div>';
            })
            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    public function query(CategoryModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
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
            Column::make('image'),
            Column::make('action'),
        ];
    }

    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
