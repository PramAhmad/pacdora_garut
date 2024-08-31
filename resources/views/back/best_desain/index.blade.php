@extends('back.layout.app')

@section('content')
@push('css')
<style>
    #bestdesain-table_filter{
        display: none;
    }
</style>    
<link rel="stylesheet" href="{{ asset('admin/package/dist/libs/select2/dist/css/select2.min.css') }}">

@endpush



<!-- create -->
<div class="card">
    <div class="card-body">
        <div class="mb-2">
            <h5 class="mb-0">Create Best Desain</h5>
        </div>
        <form action="{{ route('bestdesain.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <select class="select2 form-control" style="width: 100%; height: 36px" name="model_id" >
                <option value="">Pilih desain</option>
                @foreach ($category as $c)
                <optgroup label="{{ $c->name }}">
                    @foreach ($c->modelsLimit as $sub)
                    <option value="{{ $sub->id }}" data-image="{{$sub->image }}">{{ $sub->title }}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan</label>
                <input type="number" class="form-control" id="urutan" name="urutan" required>
             
            </div>
          
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-2">
            <h5 class="mb-0">Data Best Desain</h5>
        </div>
        <div style="width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

<!-- editModal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Best Desain</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="id">
                <div class="modal-body
                ">
                    <select class="select2 form-control" style="width: 100%; height: 36px" name="model_id" >
                        <option value="">Pilih desain</option>
                        @foreach ($category as $c)
                        <optgroup label="{{ $c->name }}">
                            @foreach ($c->modelsLimit as $sub)
                            <option value="{{ $sub->id }}" data-image="{{$sub->image }}">{{ $sub->title }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="urutan" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="urutan" name="urutan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="{{ asset('admin/package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin/package/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/package/dist/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/package/dist/js/forms/select2.init.js') }}"></script>
<!-- select2 cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $(document).ready(function() {
        $('.select2').select2({
            templateResult: formatState,
            templateSelection: formatState
        });

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var imageUrl = $(state.element).data('image');
            var $state = $(
                '<span><img src="' + imageUrl + '" class="img-flag" style="width: 30px; height: 20px; margin-right: 10px;" /> ' + state.text + '</span>'
            );
            return $state;
        }

        $('#create-modal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
        });
    });
</script>
<!-- handle edit and delete -->
<script>
    $(document).on('click', '.edit', function() {
        var id = $(this).data('id');
        var model_id = $(this).data('model_id');
        var urutan = $(this).data('urutan');
        $('#edit-modal').modal('show');
        $('#edit-modal').find('input[name="id"]').val(id);
        $('#edit-modal').find('select[name="model_id"]').val(model_id).trigger('change');
        $('#edit-modal').find('input[name="urutan"]').val(urutan);
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `bestdesain/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    }
                });
            }
        });
    });
</script>
<!-- update form handle -->
<script>
    $(document).on('submit', '#edit-modal form', function(e) {
        e.preventDefault();
        var id = $(this).find('input[name="id"]').val();
        var model_id = $(this).find('select[name="model_id"]').val();
        var urutan = $(this).find('input[name="urutan"]').val();
        $.ajax({
            url: `bestdesain/${id}`,
            type: 'PUT',
            data: {
                _token: "{{ csrf_token() }}",
                model_id: model_id,
                urutan: urutan
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data has been updated'
                }).then(() => {
                    window.location.reload();
                });
            }
        });
    });
</script>
<!-- handle swal for add data -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: `{{ session('success') }}`,
    });
</script>

@endif
@endpush
