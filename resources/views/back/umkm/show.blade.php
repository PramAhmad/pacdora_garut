@extends('back.layout.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Umkm Detail</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="./index.html">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Umkm Detail</li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="{{asset('admin/package/dist/images/breadcrumb/ChatBc.png')}}" alt="" class="img-fluid mb-n4">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button
        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
        id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab"
        aria-controls="pills-account" aria-selected="true">
        <i class="ti ti-user-circle me-2 fs-6"></i>
        <span class="d-none d-md-block">Account</span>
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
        id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
        role="tab" aria-controls="pills-notifications" aria-selected="false">
        <i class="ti ti-bell me-2 fs-6"></i>
        <span class="d-none d-md-block">Mockup</span>
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
        id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab"
        aria-controls="pills-bills" aria-selected="false">
        <i class="ti ti-article me-2 fs-6"></i>
        <span class="d-none d-md-block">Product</span>
      </button>
    </li>
    <!-- <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                  <i class="ti ti-lock me-2 fs-6"></i>
                  <span class="d-none d-md-block"></span> 
                </button>
              </li> -->
  </ul>
</div>
<div class="card-body">
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab"
      tabindex="0">

      <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
          <div class="card w-100 position-relative overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold">Approval UMKM</h5>
              <p class="card-subtitle mb-4">Ubah Status UMKM Di Sini</p>
              <div class="text-center">
                @php
                  $color = $umkm->approved == 1 ? 'success' : 'danger';
                @endphp
                <h5 class="pt-5">Status Sekarang <span
                    class="text-{{$color}} fw-bold">{{$umkm->approved == 1 ? "Active" : "Inactive"}}</span></h5>
                <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                  <button class="btn btn-primary" id="active" type="button">Active</button>
                  <button class="btn btn-outline-danger" id="inactive">Inactive</button>
                </div>
                <p class="mb-0">Ubah Status Secara Langsung</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
          <div class="card w-100 position-relative overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold">Akun Manajemen</h5>
              <p class="card-subtitle mb-4">Untuk manage akun UMKM</p>
              <form id="form1">
                <input type="hidden" name="type" value="1">
                <div class="mb-4">
                  <label for="email" class="form-label fw-semibold">Email</label>
                  <input type="email" class="form-control" id="email" value="{{$umkm->user->email}}">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label fw-semibold">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" value=""
                    placeholder="Kosongkan Jika Tidak Akan Mengubah Password">
                </div>
                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                  <button class="btn btn-primary">Save</button>
                  <button class="btn btn-light-danger text-danger">Cancel</button>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card w-100 position-relative overflow-hidden mb-0">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold">Umkm Informasi</h5>
              <p class="card-subtitle mb-4">Digunakan untuk informasi umkm yang dimiliki</p>
              <form id="form2">
                @csrf
                <input type="hidden" name="type" value="2">
                <input type="hidden" id="provinsi_id" name="provinsi_id">
                <input type="hidden" id="kota_id" name="kota_id">
                <input type="hidden" id="kecamatan_id" name="kecamatan_id">
                <input type="hidden" id="kelurahan_id" name="kelurahan_id">
                <div class="row">
                <div class="col-lg-12 mb-4">
                  <label for="nik" class="form-label fw-semibold">Nomor Induk KTP</label>
                      <input type="text" class="form-control" id="nik" value="{{$umkm->nik}}">
                    
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nama</label>
                      <input type="text" class="form-control" id="nama" value="{{$umkm->nama}}">
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Disabilitas</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="disabilitas" id="disabilitas" value="ya"
                          @if($umkm->disabilitas === 'ya') checked @endif>
                        <label class="form-check-label" for="disabilitas">Ya</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="disabilitas" id="disabilitasno" value="tidak"
                          @if($umkm->disabilitas === 'tidak') checked @endif>
                        <label class="form-check-label" for="disabilitasno">Tidak</label>
                      </div>


                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Referensi</label>
                      @php
                      $referensi = [
                        0 => 'Dinas Koperasi dan UKM Kab. Garut',
                        1 => 'Website',
                        2 => 'Social Media',
                        3 => 'Lainnya',
                      ];
                      @endphp

                      <select name="referensi" id="referensi" class="form-select">
                        <option value="">Pilih Referensi</option>
                        @foreach($referensi as $key => $value)
              <option value="{{ $key }}" @if($umkm->referensi == $key) selected @endif>{{ $value }}</option>
            @endforeach
                      </select>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nama Usaha</label>
                      <input type="text" class="form-control" id="nama_usaha" value="{{$umkm->nama_usaha}}">
                    </div>
                    <!-- #region -->    @if ($umkm->domisili != null)
                    <div class="mb-4" id="checkboxContainer">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Domisili</label>
  
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"
    @if($umkm->is_garut === 'ya') checked @endif>
  <label class="form-check-label" for="inlineCheckbox2">Kota Garut</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
    @if($umkm->is_garut === 'tidak') checked @endif>
  <label class="form-check-label" for="inlineCheckbox3">Tidak</label>
</div>
</div>
@endif

                    <div class="mb-4" id="domisiliInputContainer" style="display: none;">
                      <div class="row items-center d-flex ">
                        <div class="col-sm-8">
                          <label for="domisili" class="form-label fw-semibold">Masukkan Domisili</label>
                          <input type="text" class="form-control" id="domisili" name="domisili"
                            value="{{ $umkm->domisili ?? '' }}">

                        </div>
                        <div class="col-sm-4 " style="margin-top:40px">
                          <div class="form-check ">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                            <label class="form-check-label" for="inlineCheckbox4">Kota Garut</label>
                          </div>
                        </div>
                      </div>

                    </div>




                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nomor Hp</label>
                      <input type="text" class="form-control" id="nohp" value="{{$umkm->nohp}}">
                    </div>
                  </div>
                
                  <div class="col-12">
                    <div class="">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Alamat</label>
                      <input type="text" class="form-control" id="alamat" disabled
                        value="{{$umkm->provinsi->nama_provinsi . ', ' . $umkm->kota->nama_kota . ', ' . $umkm->kecamatan->nama_kecamatan . ', ' . $umkm->kelurahan->nama_kelurahan}}">
                    </div>
                  </div>
                  <div class="col-12 mt-2">
                    <select name="wilayah" id="wilayah" class="form-select wilayah"></select>
                  </div>

                  <div class="col-12">
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                      <button class="btn btn-primary">Save</button>
                      <button class="btn btn-light-danger text-danger">Cancel</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-notifications" role="tabpanel" aria-labelledby="pills-notifications-tab"
        tabindex="0">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Notification Preferences</h4>
                <p>
                  Select the notificaitons ou would like to receive via email. Please note that you cannot opt out of
                  receving service
                  messages, such as payment, security or legal notifications.
                </p>
                <form class="mb-7">
                  <label for="exampleInputPassword1" class="form-label fw-semibold">Email Address*</label>
                  <input type="text" class="form-control" id="exampleInputtext" placeholder="" required>
                  <p class="mb-0">Required for notificaitons.</p>
                </form>
                <div class="">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                      <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-article text-dark d-block fs-7" width="22" height="22"></i>
                      </div>
                      <div>
                        <h5 class="fs-4 fw-semibold">Our newsletter</h5>
                        <p class="mb-0">We'll always let you know about important changes</p>
                      </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                      <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-checkbox text-dark d-block fs-7" width="22" height="22"></i>
                      </div>
                      <div>
                        <h5 class="fs-4 fw-semibold">Order Confirmation</h5>
                        <p class="mb-0">You will be notified when customer order any product</p>
                      </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                      <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-clock-hour-4 text-dark d-block fs-7" width="22" height="22"></i>
                      </div>
                      <div>
                        <h5 class="fs-4 fw-semibold">Order Status Changed</h5>
                        <p class="mb-0">You will be notified when customer make changes to the order</p>
                      </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                      <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-truck-delivery text-dark d-block fs-7" width="22" height="22"></i>
                      </div>
                      <div>
                        <h5 class="fs-4 fw-semibold">Order Delivered</h5>
                        <p class="mb-0">You will be notified once the order is delivered</p>
                      </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                      <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-mail text-dark d-block fs-7" width="22" height="22"></i>
                      </div>
                      <div>
                        <h5 class="fs-4 fw-semibold">Email Notification</h5>
                        <p class="mb-0">Turn on email notificaiton to get updates through email</p>
                      </div>
                    </div>
                    <div class="form-check form-switch mb-0">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Date & Time</h4>
                <p>Time zones and calendar display settings.</p>
                <div class="d-flex align-items-center justify-content-between mt-7">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-clock-hour-4 text-dark d-block fs-7" width="22" height="22"></i>
                    </div>
                    <div>
                      <p class="mb-0">Time zone</p>
                      <h5 class="fs-4 fw-semibold">(UTC + 02:00) Athens, Bucharet</h5>
                    </div>
                  </div>
                  <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                    href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download">
                    <i class="ti ti-download"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body p-4">
                <h4 class="fw-semibold mb-3">Ignore Tracking</h4>
                <div class="d-flex align-items-center justify-content-between mt-7">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                      <i class="ti ti-player-pause text-dark d-block fs-7" width="22" height="22"></i>
                    </div>
                    <div>
                      <h5 class="fs-4 fw-semibold">Ignore Browser Tracking</h5>
                      <p class="mb-0">Browser Cookie</p>
                    </div>
                  </div>
                  <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="d-flex align-items-center justify-content-end gap-3">
              <button class="btn btn-primary">Save</button>
              <button class="btn btn-light-danger text-danger">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    function toggleVisibility() {
      if ($('#inlineCheckbox3').is(':checked')) {
        $('#checkboxContainer').hide();
        $('#domisiliInputContainer').show();
      } else {
        $('#checkboxContainer').show();
        $('#domisiliInputContainer').hide();
      }
    }
    toggleVisibility();
    $('#inlineCheckbox2').change(function () {
      if ($(this).is(':checked')) {
        $('#inlineCheckbox3').prop('checked', false);
        $('#inlineCheckbox4').prop('checked', false);
      }
      toggleVisibility();
    });

    $('#inlineCheckbox3').change(function () {
      if ($(this).is(':checked')) {
        $('#inlineCheckbox2').prop('checked', false);
      }
      toggleVisibility();
    });

    $('#inlineCheckbox4').change(function () {
      if ($(this).is(':checked')) {
        $('#inlineCheckbox3').prop('checked', false);
      }
      toggleVisibility();
    });
  });
</script>
<script>
  $(".select2").select2({

    placeholder: "Pilih Wilayah",
    allowClear: true
  });

  $('.wilayah').select2({

    placeholder: "Cari Kecamatan, Kota atau Provinsi",
    minimumInputLength: 1,
    ajax: {
      url: `{{ route('ajax.wilayah.search') }}`,
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: $.map(data.data, function (item) {
            return {
              text: `${item.nama_provinsi}, ${item.nama_kota}, ${item.nama_kecamatan}, ${item.nama_kelurahan}`,
              id: item.id,
              provinsi_id: item.provinsi_id,
              kota_id: item.kota_id,
              kecamatan_id: item.kecamatan_id,
              kelurahan_id: item.kelurahan_id,
              provinsi: item.nama_provinsi,
              kota: item.nama_kota,
              kecamatan: item.nama_kecamatan,
              kelurahan: item.nama_kelurahan
            };
          }),
          pagination: {
            more: data.more_pagination
          }
        };
      },
      cache: true
    }
  })
  $('.wilayah').on('select2:select', function (e) {
    var data = e.params.data;
    var address = `${data.provinsi}, ${data.kota}, ${data.kecamatan}, ${data.kelurahan}`;
    console.log(data)
    $('#alamat').val(address);
    $('#provinsi_id').val(data.provinsi_id);
    $('#kota_id').val(data.kota_id);
    $('#kecamatan_id').val(data.kecamatan_id);
    $('#kelurahan_id').val(data.id);
    $('#alamat').val(address);
  });
</script>
<script>
  form1.onsubmit = function (e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#exampleInputPassword1').val();
    $.ajax({
      
      url: `{{ route('umkm.update', $umkm->id) }}`,
      type: 'PUT',
      data: {
        _token: '{{ csrf_token() }}',
        type: 1,
        email: email,
        password: password
      },
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Akun UMKM Berhasil Diubah!',
        });
      },
      error: function (response) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error updating account UMKM!',
        });
      }
    });
  }
  form2.onsubmit = function (e) {
    e.preventDefault();
    var nama = $('#nama').val();
    var nik = $('#nik').val();
    var disabilitas = $('input[name="disabilitas"]:checked').val();
    var referensi = $('#referensi').val();
    var nama_usaha = $('#nama_usaha').val();
    var is_garut = $('input[name="is_garut"]:checked').val();
    var domisili = $('#domisili').val();
    var nohp = $('#nohp').val();
    var provinsi_id = $('#provinsi_id').val();
    var kota_id = $('#kota_id').val();
    var kecamatan_id = $('#kecamatan_id').val();
    var kelurahan_id = $('#kelurahan_id').val();
  

    $.ajax({
      url: `{{ route('umkm.update', $umkm->id) }}`,

      type: 'PUT',
      data: {
        type: 2,
        _token: "{{ csrf_token() }}",
        nama: nama,
        nik:nik,
        disabilitas: disabilitas,
        referensi: referensi,
        nama_usaha: nama_usaha,
        is_garut: is_garut,
        domisili: domisili,
        nohp: nohp,
        provinsi_id: provinsi_id,
        kota_id: kota_id,
        kecamatan_id: kecamatan_id,
        kelurahan_id: kelurahan_id
      },
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Informasi UMKM Berhasil Diubah!',
        });
      },
      error: function (response) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Error updating info UMKM!',
        });
      }
    });
  }
</script>
<script>
        $(document).ready(function() {
            $('#active').on('click', function() {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Untuk Activekan UMKM ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `{{ route('approved', $umkm->id) }}`, 
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Approved!',
                                    'The item has been approved.',
                                    'success'
                                );
                              //  wait 3s
                                setTimeout(function(){
                                    window.location.reload();
                                }, 3000);

                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'There was an error approving the item.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('#inactive').on('click', function() {
                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Kamu Akan Menonaktifkan UMKM ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Nonaktifkan UMKM!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `{{ route('unapprov', $umkm->id) }}`, 
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Disapproved!',
                                    'The item has been disapproved.',
                                    'success'
                                );
                                setTimeout(function(){
                                    window.location.reload();
                                }, 3000);
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'There was an error disapproving the item.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection