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

class ApprovalUmkmDataTable extends DataTable
{
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
                return $umkm->approved ? '<span class="badge font-medium bg-light-primary text-primary>Approved</span>"' : '<span class="badge font-medium bg-light-danger text-danger">Not Approved</span> ';
            })
            ->addColumn('approv', function($umkm){
                return '<form action="/approved/'.$umkm->id.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn-sm btn btn-primary">Approve</button>
                        </form>';
            })
            
            
            ->setRowId('id')
            ->rawColumns(['approv','approved']);

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Umkm $model): QueryBuilder
    {
        return $model->where('approved' , 0)->with('user');
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
                Column::make('nama_usaha'),
                Column::make('approved'),
                Column::make('approv')    

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
