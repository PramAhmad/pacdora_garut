@extends('back.layout.app')

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
            <h5 class="mb-0">Data Template Image</h5>
        </div>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#create-modal">Create Template</button>
        <div style="width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-template-form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="image" class="form-label">Image </label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-template-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                 
                    <div class="mb-3">
                        <label for="edit-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="edit-image" name="image">
                    </div>
                    <img id="edit-image-preview" src="" alt="preview" style="width: 100%; height: 100%; display:none;">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('admin/package/dist/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script type="text/javascript">
$(document).ready(function() {
    // Create template
    $('#create-template-form').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this); // Use FormData to handle file uploads

        $.ajax({
            type: 'POST',
            url: `{{ route('template.store') }}`,
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                $('#create-modal').modal('hide');
                $('#template-table').DataTable().ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Template created successfully!',
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error creating template! ' + response.responseText,
                });
            }
        });
    });

    // Edit template
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.get('/admin'+'/template/' + id + '/edit', function(data) {
            console.log(data)
            $('#edit-id').val(data.id);
            $('#edit-name').val(data.name);
            $('#edit-image').val(data.image);
            // preview image
            $('#edit-image-preview').attr('src', data.image);

            $('#edit-modal').modal('show');
        });
    });


    $('#edit-template-form').on('submit', function(e) {
        e.preventDefault();
        
        var id = $('#edit-id').val();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '/admin/template/update/' + id,
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
                $('#edit-modal').modal('hide');
                $('#template-table').DataTable().ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Template updated successfully!',
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error updating template! ' + response.responseText,
                });
            }
        });
    });
});
</script>
@endpush
