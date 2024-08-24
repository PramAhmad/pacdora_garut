@extends('back.layout.app')
@push('css')
@livewireScripts
@endpush
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="mb-2">
            <h5 class="mb-0">Data UMKM</h5>
        </div>
        <div class="mb-2">
            <a href="{{ route('umkm.export') }}" class="btn btn-success">Export UMKM Data</a>
        </div>
        <div style="width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

@endsection

@push('js')
@livewireScripts
<script src="admin/package/dist/libs/jquery/dist/jquery.min.js"></script>
<script src="admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
