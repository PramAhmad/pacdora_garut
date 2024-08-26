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
            <h5 class="mb-0">Data Master Subcategory</h5>
        </div>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#create-modal">Create Subcategory</button>
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
                <h5 class="modal-title" id="createModalLabel">Create Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-subcategory-form">
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
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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
                <h5 class="modal-title" id="editModalLabel">Edit Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-subcategory-form">
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
                        <label for="edit-category_id" class="form-label">Category</label>
                        <select class="form-select" id="edit-category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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
        // Create subcategory
        $('#create-subcategory-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `{{ route('subcategory.store') }}`,
                data: $(this).serialize(),
                success: function(response) {
                    $('#create-modal').modal('hide');
                    $('#subcategory-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Subcategory created successfully!',
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error creating subcategory!',
                    });
                }
            });
        });

        // Edit subcategory
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            console.log(id);
        $.get('/admin'+'/subcategory/' + id + '/edit', function(data) {
                console.log(data)
                $('#edit-id').val(data.id);
                $('#edit-name').val(data.name);
                $('#edit-key').val(data.key);
                $('#edit-category_id').val(data.category_id);
                $('#edit-image').val(data.image);
                $('#edit-modal').modal('show');
            });
        });

        // Update subcategory AJAX
        $('#edit-subcategory-form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#edit-id').val();
            $.ajax({
                type: 'PUT',
                url: '/admin/subcategory/' + id,
                data: $(this).serialize(),
                success: function(response) {
                    $('#edit-modal').modal('hide');
                    $('#subcategory-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Subcategory updated successfully!',
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error updating subcategory!',
                    });
                }
            });
        });
    });
    function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                url: `/admin/subcategory/delete/${id}`,
                data: {
                    '_token': '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('#subcategory-table').DataTable().ajax.reload();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                },
              
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error deleting subcategory! ' + response.responseText,
                    });
                }
            });
        }
    })
}

</script>
@endpush
