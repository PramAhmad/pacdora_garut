<?php
namespace App\DataTables;

use App\Traits\HttpTrait;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HistoryDataTable extends DataTable
{
    use HttpTrait;

    /**
     * Build the DataTable class.
     *
     * @param Collection $collection Results from query() method.
     */
    public function dataTable(Collection $collection)
    {
        return datatables()
            ->collection($collection)
            ->addColumn('action', 'history.action')

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): Collection
    {
        $data = $this->get("https://api.pacdora.com/open/v1/user/projects");

        $collection = collect($data);
        
        return $collection;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('history-table')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('screenshot'),
            Column::make('modelId'),
            Column::make('userId'),
            Column::make('name'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'History_' . date('YmdHis');
    }
}
