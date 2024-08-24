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
            <h5 class="mb-0">Data Mockup Models</h5>
        </div>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#create-modal">Create model</button>
        <div style="max-width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Models</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Models</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-model-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="image" class="form-label">Image URL</label>
                                <input type="text" class="form-control" id="image" name="image" required>
                            </div>
                            <!-- img preview -->
                            <div class="mb-3">
                                <img src="" id="img-preview" class="img-thumbnail" style="max-width: 33%;" alt="Image Preview">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-1">
                                <label for="subimageone" class="form-label">Sub Image URL</label>
                                <input type="text" class="form-control" id="subimageone" name="subimageone" required>
                            </div>
                            <div class="mb-2">
                                <label for="subimagetwo" class="form-label"></label>
                                <input type="text" class="form-control" id="subimagetwo" name="subimagetwo" required>
                            </div>
                            <div class="d-flex" style="gap:10px">
                                <img src="" id="sub1-img-preview" class="img-thumbnail" style="max-width: 33%;" alt="Image Preview">
                                <img src="" id="sub2-img-preview" class="img-thumbnail" style="max-width: 33%;" alt="Image Preview">
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="mb-3">
                                <label for="model" class="form-label">Model Id</label>
                                <input type="text" class="form-control" id="model" name="model" required>
                                <p class="text-sm text-danger my-1">*Tidak Di Rekomendasikan Untuk Di Ubah</p>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($category as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                        <label for="subcategory" class="form-label">Subcategory</label>
                        <select class="form-select" id="subcategory" name="sub_category" required>
                            <option value="">Select Subcategory</option>
                        </select>
                    </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="materialone" class="form-label">Material One</label>
                                <input type="text" class="form-control" id="materialone" name="materialone" required>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- materialtwo -->
                            <div class="mb-3">
                                <label for="materialtwo" class="form-label">Material Two</label>
                                <!-- input text -->
                                 <input type="text" class="form-control" id="materialtwo" name="materialtwo" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="edit-id" name="id">

                   

                   
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
<script>

    $(document).ready(function() {
        $('#category').on('change', function() {
            var id = $(this).val();
            
            $.ajax({
            url: '/admin/subcategory/search/' + id,
                type: 'GET',
                success: function(response) {
                    var data = response.data;
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                    $('#subcategory').html(html);
                }
            });
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Create model 
        $('#create-model-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: `{{ route('model.store') }}`,
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response)
                    $('#create-modal').modal('hide');
                    $('#model-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'model created successfully!',
                    });
                },
                error: function(response) {
                    console.log(response)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error creating model!',
                    });
                }
            });
        });

        // Edit model
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $.get('/admin/model/' + id + '/edit', function(data) {
                console.log(data)
                $('#edit-id').val(data.id);
                $('#image').val(data.image);
                $('#model').val(data.model);
                $('#subimageone').val(data.subimagetwo);
                $("#sub1-img-preview").attr('src', data.subimageone);
                $('#subimagetwo').val(data.subimagetwo);
                $("#sub2-img-preview").attr('src', data.subimagetwo);

                $('#title').val(data.title);
                $('#subcategory').val(data.sub_category);
                $('#category').val(data.category_id);
                $("#img-preview").attr('src', data.image);
                $('#edit-modal').modal('show');
               $('#materialone').val(data.materialone);
                $('#materialtwo').val(data.materialtwo);


            });
        })


        // Update model AJAX
        $('#edit-model-form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#edit-id').val();
            $.ajax({
                type: 'PUT',
                url: '/admin/model/' + id,
                data: $(this).serialize(),
                success: function(response) {
                    $('#edit-modal').modal('hide');
                    $('#model-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'model updated successfully!',
                    });
                },
                error: function(response) {
                    console.log(response)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.responseJSON.message ,
                    });
                }
            });
        });
    });
</script>
@endpush