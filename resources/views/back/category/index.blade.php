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
            <h5 class="mb-0">Data Master Category</h5>
        </div>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#create-modal">Create Category</button>
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
                <h5 class="modal-title" id="createModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-category-form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="key" class="form-label">Key</label>
                        <input type="text" class="form-control" id="key" name="key" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" required>
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
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-category-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-key" class="form-label">Key</label>
                        <input type="text" class="form-control" id="edit-key" name="key" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-image" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="edit-image" name="image" required>
                    </div>
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
        // Create category 
        $('#create-category-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `{{ route('category.store') }}`,
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response)
                    $('#create-modal').modal('hide');
                    $('#category-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Category created successfully!',
                    });
                },
                error: function(response) {
                    console.log(response)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error creating category!',
                    });
                }
            });
        });

        // Edit category
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $.get('/admin/category/' + id + '/edit', function(data) {
                console.log(data)
                $('#edit-id').val(data.id);
                $('#edit-name').val(data.name);
                $('#edit-key').val(data.key);
                $('#edit-image').val(data.image);
                $('#edit-modal').modal('show');
            });
        })


        // Update category AJAX
        $('#edit-category-form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#edit-id').val();
            $.ajax({
                type: 'PUT',
                url: '/admin/category/' + id,
                data: $(this).serialize(),
                success: function(response) {
                    $('#edit-modal').modal('hide');
                    $('#category-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Category updated successfully!',
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error updating category!',
                    });
                }
            });
        });
    });
</script>
@endpush
