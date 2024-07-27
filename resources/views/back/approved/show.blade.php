@extends('back.layout.app')
@section('content')
<div class="col-12">
          <div class="card w-100 position-relative overflow-hidden mb-0">
            <div class="card-body p-4">
              <p class="card-title fw-semibold">Detail UMKM</p
              <p class="card-subtitle mb-4">Harap Periksa Terlebih Dahulu Data</p>
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
                     <h5 class="text-primary">{{$umkm->nik}}</h5>
                    
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nama</label>
                        <p>{{$umkm->nama}}</h>
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Disabilitas</label>
                        @php

                        if($umkm->disabilitas == 'ya'){
                          $color = 'primary';
                        }else{
                            $color = 'danger';
                            }
                        @endphp
                        <p class="text-{{$color}}" >{{$umkm->disabilitas}} , mengidap disabilitas</p>



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

                        <p>{{$umkm->referensi ?? 'tidak ada referensi'}}</p>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nama Usaha</label>
                        <p>{{$umkm->nama_usaha}}</p>
                    </div>
                  
                    <div class="mb-4" id="checkboxContainer">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Domisili</label>
                    @if ($umkm->is_garut == 'ya')
                        <p >Kota Garut</p>
                    @else
                        <p>{{$umkm->domisili}}</p>
                    @endif
                   

                    </div>




                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Nomor Hp</label>
                        <p>{{$umkm->nohp}}</p>
                    </div>
                  </div>
                
                  <div class="col-12">
                    <div class="">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Alamat</label>
                        <p class="">Provinsi {{$umkm->provinsi->nama_provinsi}} ,{{$umkm->kota->nama_kota}} , Kecamatan {{$umkm->kecamatan->nama_kecamatan}}, Kelurahan {{$umkm->kelurahan->nama_kelurahan}} {{$umkm->alamat_usaha}}</p>
                    </div>
                  </div>
                  <!-- approval approv/reject kalo reject kasih input text alasan reject -->
                   <div class="col-6">
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label fw-semibold">Update Status</label>
                      <select class="form-select" name="status" id="status">
                      <!-- selected by ststua -->
                        <option value="1">Approve</option>
                        <option value="3" {{$umkm->approved == 3 ? 'selected' : ''}}>Reject</option>
                      </select>
                    </div>
                   </div>
                     <div class="col-12" id="alasan" style="display: none;">
                      <div class="mb-4">
                         <label for="exampleInputPassword1" class="form-label fw-semibold">Alasan Reject</label>
                            <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="5">{{$umkm->alasan_reject}}</textarea>
                      </div>
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

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
//   langsung display alasan jika approved == 3
console.log($('#status').val());
    if($('#status').val() == 3){
        $('#alasan').show();
    }
    $('#status').change(function(){
        if($(this).val() == 3){
        $('#alasan').show();
        }else{
        $('#alasan').hide();
        }
    })
 </script>
@endsection
