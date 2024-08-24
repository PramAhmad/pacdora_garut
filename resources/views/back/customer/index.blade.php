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
            <h5 class="mb-0">Data customer</h5>
        </div>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#create-modal">Create customer</button>
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
                <h5 class="modal-title" id="createModalLabel">Create customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-customer-form" enctype="multipart/form-data">
                    @csrf
                    <!-- nama,nama_usaha,isi,foto -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_usaha" class="form-label
                        ">Nama Usaha</label>
                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <input type="text" class="form-control" id="isi" name="isi" required>
                    </div>
                    <!-- file -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <!-- preview -->
                    <div class="mb-3">
                        <img id="preview" src="" alt="preview" style="width: 100%; height: 100%; display:none;">
                    </div>


                    <script>
                        document.getElementById('foto').addEventListener('change', function(event) {
                            var file = event.target.files[0]; 
                            var reader = new FileReader(); 

                            reader.onload = function(e) {
                                var preview = document.getElementById('preview');
                                preview.src = e.target.result; 
                                preview.style.display = 'block'; 
                            };

                            if (file) {
                                reader.readAsDataURL(file); 
                            }
                        });
                    </script>
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
                <h5 class="modal-title" id="editModalLabel">Edit customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-customer-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_usaha" class="form-label
                        ">Nama Usaha</label>
                        <input type="text" class="form-control" id="edit-nama_usaha" name="nama_usaha" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <input type="text" class="form-control" id="edit-isi" name="isi" required>
                    </div>
                    <!-- file -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="edit-foto" name="foto" >
                    </div>
                    <!-- preview -->
                    <div class="mb-3">
                        <img id="edit-preview" src="" alt="preview" style="width: 100px; height: 100px;"    >
                    </div>
                    <script>
                        document.getElementById('edit-foto').addEventListener('change', function(event) {
                            var file = event.target.files[0]; 
                            var reader = new FileReader(); 

                            reader.onload = function(e) {
                                var preview = document.getElementById('edit-preview');
                                preview.src = e.target.result; 
                                preview.style.display = 'block'; 
                            };

                            if (file) {
                                reader.readAsDataURL(file); 
                            }
                        });
                    </script>


                    <button type="submit" class="btn btn-primary">Update</button>
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
        // Create customer 
        $('#create-customer-form').on('submit', function(e) {
            e.preventDefault();
            let csrf = "{{ csrf_token() }}";
            let form = $(this);
            let formData = new FormData(form[0]);
            formData.append('_token', csrf);
            $.ajax({
                type: 'POST',
                url: `{{ route('customer.store') }}`,
                contentType: false,
                processData: false,
                
                data: formData,

                success: function(response) {
                    console.log(response)
                    $('#create-modal').modal('hide');
                    $('#customer-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'customer created successfully!',
                    });
                },
                error: function(response) {
                    console.log(response)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.responseJSON.message,
                    });
                }
            });
        });

        // Edit customer
        $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $.get('/admin/customer/' + id + '/edit', function(data) {
                console.log(data)
                $('#edit-id').val(data.id);
                $('#edit-nama').val(data.nama);
                $('#edit-nama_usaha').val(data.nama_usaha);
                $('#edit-isi').val(data.isi);
                $('#edit-preview').attr('src', `{{ asset('upload/customer') }}/${data.foto}`);


                $('#edit-modal').modal('show');
            });
        })


        // Update customer AJAX
        $('#edit-customer-form').on('submit', function(e) {
            e.preventDefault();
            let id = $('#edit-id').val();
            let csrf = "{{ csrf_token() }}";
            let form = $(this);
            let formData = new FormData(form[0]);
            formData.append('_token', csrf);
            formData.append('_method', 'PUT');
            $.ajax({
                type: 'POST',
                url: `/admin/customer/${id}`,
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    console.log(response)
                    $('#edit-modal').modal('hide');
                    $('#customer-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'customer updated successfully!',
                    });
                },
                error: function(response) {
                    console.log(response)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.responseJSON.message,
                    });
                }
            });
        });
    });
</script>
@endpush