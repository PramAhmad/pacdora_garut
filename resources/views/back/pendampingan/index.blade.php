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
            <h5 class="mb-0">Data pendampingan</h5>
        </div>
        <div style="width: 100%;">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Pendampingan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Klasifikasi Usaha</th>
                            <td id="klasifikasi_usaha"></td>
                        </tr>
                        <tr>
                            <th>NPWP</th>
                            <td id="npwp"></td>
                        </tr>
                        <tr>
                            <th>Bidang Usaha</th>
                            <td id="bidang_usaha"></td>
                        </tr>
                        <tr>
                            <th>Nama Produk</th>
                            <td id="nama_produk"></td>
                        </tr>
                        <tr>
                            <th>Deskripsi Usaha</th>
                            <td id="deskripsi_usaha"></td>
                        </tr>
                        <tr>
                            <th>Web</th>
                            <td id="web"></td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td id="ig"></td>
                        </tr>
                        <tr>
                            <th>TikTok</th>
                            <td id="tiktok"></td>
                        </tr>
                        <tr>
                            <th>WhatsApp</th>
                            <td id="wa"></td>
                        </tr>
                        <tr>
                            <th>Tahun Berdiri</th>
                            <td id="tahun_berdiri"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Karyawan</th>
                            <td id="jumlah_karyawan"></td>
                        </tr>
                        <tr>
                            <th>Modal Usaha</th>
                            <td id="modal_usaha"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Modal</th>
                            <td id="jumlah_modal"></td>
                        </tr>
                        <tr>
                            <th>NIB</th>
                            <td id="nib"></td>
                        </tr>
                        <tr>
                            <th>Perizinan</th>
                            <td id="perizinan"></td>
                        </tr>
                        <tr>
                            <th>Pendampingan</th>
                            <td id="pendampingan"></td>
                        </tr>
                    </tbody>
                </table>
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

<!-- get data modal using ajax -->
<script>
    $(document).on('click', '.detail-btn', function() {
        var id = $(this).data('id');
        $.get('/admin/pendampingan/show/' + id, function(data) {
            console.log(data);
            $('#klasifikasi_usaha').html(data.klasifikasi_usaha);
            $('#npwp').html(data.npwp);
            $('#bidang_usaha').html(data.bidang_usaha.nama);
            $('#nama_produk').html(data.nama_produk);
            $('#deskripsi_usaha').html(data.deskripsi_usaha);
            $('#web').html(data.web);
            $('#ig').html(data.ig);
            $('#tiktok').html(data.tiktok);
            $('#wa').html(data.wa);
            $('#tahun_berdiri').html(data.tahun_berdiri);
            $('#jumlah_karyawan').html(data.jumlah_karyawan);
            $('#modal_usaha').html(data.modal_usaha);
            $('#jumlah_modal').html(data.jumlah_modal);
            $('#nib').html(data.nib);
            $('#perizinan').html(data.perizinan);
            $('#pendampingan').html(data.pendampingan);
            $('#detailModal').modal('show');
        });
    });
</script>



<script>
    function confirmDelete(pendampinganId) {
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
                    url: '{{ route("pendampingan.destroy") }}', 
                    type: 'DELETE',
                    data: {
                        id: pendampinganId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#pendampingan-table').DataTable().ajax.reload();
                        Swal.fire(
                            'Deleted!',
                            'The pendampingan has been deleted.',
                            'success'
                        );
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the pendampingan.',
                            'error'
                        );
                    }
                });
            }
        })
    }
    
</script>
@endpush
