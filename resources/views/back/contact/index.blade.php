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
            <h5 class="mb-0">Data Contact</h5>
        </div>
        <div style="width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

<!-- modal delete -->




@endsection

@push('js')
<script src="{{asset('admin/package/dist/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    function confirmDelete(contactId) {
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Kamu Tidak Dapat Mengembalikan Data Jika Sudah Dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
               
                $.ajax({
                    url: '{{ route("contact.destroy") }}', 
                    type: 'DELETE',
                    data: {
                        id: contactId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#contact-table').DataTable().ajax.reload();
                        Swal.fire(
                            'Deleted!',
                            'The contact has been deleted.',
                            'success'
                        );
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the contact.',
                            'error'
                        );
                    }
                });
            }
        })
    }
</script>
@endpush
