<?php

namespace App\DataTables;

use App\Models\Pendampingan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendampinganDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->editColumn('nama_umkm', function ($data) {
                return '<span class="badge bg-'.($data->umkm->nama == 'aktif' ? 'success' : 'danger').'">'.ucfirst($data->umkm->nama).'</span>';
            })
            ->editColumn('klasifikasi_usaha', function ($data) {
                return $data->bidang_usaha->nama;
            })
            ->editColumn('id', function ($data) {
                return $data->id;
            })  
            // add colom action ada button delete dan show detail modal
            ->editColumn('action', function ($data) {
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
                      <button type="button" class="dropdown-item detail-btn" data-id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</button>
                  </li>
                    <li>
            <button type="button" class="dropdown-item" onclick="confirmDelete('.$data->id.')" >Delete</button>
        </li>
                </ul>
              </div>';
            })

            ->rawColumns(['nama_umkm','klasifikasi_usaha','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pendampingan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pendampingan-table')
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
            Column::make('id'),  
            Column::make('nama_umkm'),
            Column::make('klasifikasi_usaha'),
            Column::make('wa'),
            Column::make('pendampingan'),
            Column::make('action')
    
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pendampingan_' . date('YmdHis');
    }
}
