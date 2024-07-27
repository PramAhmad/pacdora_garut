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
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($project as $p )
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{$p['screenshot']}}" class="rounded-2" width="42" height="42" />
                          <div class="ms-3">
                            <h6 class="fw-semibold mb-1">{{$p['name']}}</h6>
                            <span class="fw-normal">{{$p['width']}} * {{$p['height']}}</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex align-items-center gap-2">
                      
                            <span class="badge bg-light-primary text-primary rounded-3 fw-semibold fs-2">{{ $p['umkm']->nama }}</span>
                      
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
                              <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-plus"></i>Lihat</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="#"><i class="fs-4 ti ti-trash"></i>Delete</a>
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
    </div>
</div>



@endsection

@push('js')
<script src="{{asset('admin/package/dist/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="{{asset('admin/package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>     -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
