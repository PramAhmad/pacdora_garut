@extends('front.layouts.app')
@section('content')
<div class="container py-16">
    <h3 class="text-center text-accent text-2xl font-medium underline mb-8">Pilih Template</h3>

    <!-- table -->
    <div class="overflow-x-auto pt-10">
        <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-jacarta-100">
                <tr>
                    <th class="px-6 py-3 text-left text-jacarta-600 font-medium">Select</th>
                    <th class="px-6 py-3 text-left text-jacarta-600 font-medium">Foto</th>
                    <th class="px-6 py-3 text-left text-jacarta-600 font-medium">Nama Template</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($templates as $template)
                <tr class="border-b hover:bg-jacarta-50 transition duration-150">
                    <!-- checkbox -->
                    <td class="px-6 py-1">
                        <input type="checkbox" name="template_id" value="{{ $template->id }}" class="form-checkbox h-5 w-5 text-accent rounded-md border-accent ">
                    </td>
                    <td class="px-6 py-1">
                    <a href="{{asset('upload/temp/'.$template->image)}}" target="_blank"><img src="{{asset('upload/temp/'.$template->image)}}" width="100px" height="100px"></a>
                    </td>
                    <td class="px-6 py-1 text-jacarta-700">{{ $template->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- resource link paging-->
    <div class="mt-8">
        {{ $templates->links() }}
    </div>


    <div class="mt-8 text-center">
        <button class="bg-accent text-white px-8 py-3 rounded-lg shadow hover:bg-accent mt-10 focus:outline-none focus:ring-4 focus:ring-accent-lighter">
            Tambahkan 
        </button>
    </div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('button').click(function() {
                var template_id = [];
                $.each($("input[name='template_id']:checked"), function() {
                    template_id.push($(this).val());
                });
                if (template_id.length > 0) {
                    $.ajax({
                        url: "{{ route('template.select.store') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "template_id": template_id
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Template berhasil ditambahkan',
                            }).then(function() {
                                window.location.reload();
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan',
                            });
                        } 
                    });
                } else {
                    alert('Pilih minimal satu template');
                }
            });
        });
    </script>

   

@endpush
@endsection
