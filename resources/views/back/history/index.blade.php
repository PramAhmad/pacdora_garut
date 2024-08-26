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
        <h5 class="mb-5">History Design</h5>
          
            

        </div>
     <div style="width: 100%;">
        <div class="table-responsive rounded-2">
                <table class="table border text-nowrap customize-table mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th><h6 class="fs-4 fw-semibold mb-0">Project</h6></th>
                      <th><h6 class="fs-4 fw-semibold mb-0">Umkm</h6></th>
                      <th><h6 class="fs-4 fw-semibold mb-0">Model Id</h6></th>
                      <th><h6 class="fs-4 fw-semibold mb-0">Action</h6></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($project as $p )
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{$p['screenshot']}}" class="rounded-2" width="42" height="42" />
                          <div class="ms-3">
                            <h6 class="fw-semibold mb-1 text-dark"><a href="{{route('profile.design',['id' => $p['id']])}}" class="text-dark">{{$p['name'] ?? '' }}</a></h6>
                            <span class="fw-normal">{{$p['width']}} * {{$p['height']}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                      
                            <span class="badge bg-light-primary text-primary rounded-3 fw-semibold fs-2">{{ $p['umkm']->nama  ?? ''}}</span>
                      
                        </div>
                      </td>
                      <td><p class="mb-0 fw-normal">{{$p['modelId']}}</p></td>
                      <td>
                        <div class="dropdown dropstart">
                          <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots fs-5"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="{{route('profile.design',['id' => $p['id']])}}"><i class="fs-4 ti ti-plus"></i>Lihat</a>
                            </li>
                            <li>
                              <button class="dropdown-item d-flex align-items-center gap-3" onclick="deleteconfirm(`{{$p['id']}}`)" id="delete-btn"><i class="fs-4 ti ti-trash"></i>Delete</button>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr> 
                    @empty
                        
                    @endforelse
                   
                   
                  
                  </tbody>
                </table>
              </div>
        </div>
        <!-- diplay paging link -->

   <div class="py-5">
   {{ $project->links('vendor.pagination.bootstrap-5') }}
    
   </div>

    </div>
</div>



@endsection

@push('js')
<script src="{{asset('admin/package/dist/libs/jquery/dist/jquery.min.js')}}"></script>

<!-- <script src="{{asset('admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>     -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // kirim ajax saat delete button
  function deleteconfirm(id) {
    console.log(id);
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
        url: "https://api.pacdora.com/open/v1/user/projects",
        contentType: 'application/json',
        headers: {
          'appId': '71ee73045e3480fe',
          'appKey': 'a3e831ccfa3ffd84',
        },
        data: JSON.stringify({
          projectIds: [id] 
        }),
        success: function(response) {
          $('#template-table').DataTable().ajax.reload();
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          );
        },
        error: function(response) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error deleting template! ' + response.responseText,
          });
        }
      });
      }
  

    })  
  }

</script>
@endpush
