@extends('dashboard/template')

@section('title','Dashboard')

@section('dashboard','active')

@section('home_active','/assets/img/home-icon.png')

@section('groups_active','/assets/img/groups-icon.png')

@section('user_active','/assets/img/user-icon.png')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                          @if ($message = Session::get('sukses'))
                        <div class="alert alert-success" role="alert">
                           {{ $message }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%">
                            <div class="col-md-12">
                              @php
                            if(Session::get('role')==1){
                            @endphp
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buatCampaign">
  + Buat Campaign
</button>
<!-- Modal -->
<div class="modal fade" id="buatCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Buat Campaign</h3>
        <div class="row" style="font-size: 20px;margin-top: 15%">
          <div class="col-md-12 text-center">
            <p>Campaign apa yang ingin kamu buat?</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-8" style="margin-left: 10%">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#openCampaign" data-dismiss="modal">
          Open Campaign
        </button>
<span style="margin-left: 10%;margin-right: 10%">Atau</span>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#privateCampaign" data-dismiss="modal">
          Private Campaign
        </button></div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="openCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          timeline
        </div>
        <h3>Buat Campaign</h3>
        <div class="row" style="margin-top: 5%">
          <div class="col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-md-3">
                <img src="/images/icon/profile.png">
                <input type="file" name="photo_campaign" class="form-control">
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <h5>Nama Campaign</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="hidden" name="tipe" value="0">
                    <input type="text" name="campaign" class="form-control" placeholder="Nama Campaignmu">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Nama Produk</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="text" name="produk" class="form-control" placeholder="Nama Campaignmu">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Tag Produk</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <fieldset id="buildyourform">
                    <select name="tag[]" id="tag" style="margin-right: 1%">
                      @foreach($list_tag as $row)
                      <option value="{{$row->id_master}}">{{$row->deskripsi}}</option>
                      @endforeach
                    </select>
                  </fieldset>
                  <input type="button" value="+Tambah" id="add" class="btn btn-secondary" style="margin-top: 2%" />
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Daerah</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <fieldset id="buildyourform2">
                    <select name="daerah[]" id="daerah" style="margin-right: 1%">
                      <option value="malang">Kota Malang</option>
                      <option value="surabaya">Surabaya</option>
                    </select>
                  </fieldset>
                  <input type="button" value="+Tambah" id="add2" class="btn btn-secondary" style="margin-top: 2%" />
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Biaya Per Influencer</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="number" name="biaya" class="form-control">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-6">
                    <h5>Deadline Pendaftaran</h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Jenis Campaign</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-6">
                    <input type="date" name="deadline" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="jenis">
                      <option value="0">Post</option>
                      <option value="1">Instastory</option>
                    </select>
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-6">
                    <h5>Tanggal Post</h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Tanggal Laporan</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-6">
                    <input type="date" name="post" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="date" name="laporan" class="form-control">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Deskripsi</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder="Bagaimana Campaignmu akan berjalan?" name="deskripsi"></textarea>
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Contoh Foto</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <fieldset id="buildyourform3">
                    <input type="file" name="photo_example[]" id="photo_example" style="width: 80%">
                    </fieldset>
                  <input type="button" value="+Tambah" id="add3" class="btn btn-secondary" style="margin-top: 2%" />
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Syarat</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder="Influencer seperti apa yang kamu cari?" name="syarat"></textarea>
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-10"></div>
                  <div class="col-md-2 text-right">
                    <input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="privateCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          timeline
        </div>
        <h3>Private Campaign</h3>
        <div class="row" style="margin-top: 5%">
          <div class="col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-md-3">
                <img src="/images/icon/profile.png">
                <input type="file" name="photo_campaign" class="form-control">
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                    <h5>Nama Campaign</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="hidden" name="tipe" value="1">
                    <input type="text" name="campaign" class="form-control" placeholder="Nama Campaignmu">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Nama Produk</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="text" name="produk" class="form-control" placeholder="Nama Campaignmu">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Tag Produk</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <fieldset id="buildyourform4">
                    <select name="tag[]" id="tag2" style="margin-right: 1%">
                      @foreach($list_tag as $row)
                      <option value="{{$row->id_master}}">{{$row->deskripsi}}</option>
                      @endforeach
                    </select>
                  </fieldset>
                  <input type="button" value="+Tambah" id="add4" class="btn btn-secondary" style="margin-top: 2%" />
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Biaya Per Influencer</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <input type="number" name="biaya" class="form-control">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-6">
                    <h5>Batas Tunggu Konfirmasi</h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Jenis Campaign</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-6">
                    <input type="date" name="deadline" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="jenis">
                      <option value="0">Post</option>
                      <option value="1">Instastory</option>
                    </select>
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-6">
                    <h5>Tanggal Post</h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Tanggal Laporan</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-6">
                    <input type="date" name="post" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <input type="date" name="laporan" class="form-control">
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Contoh Foto</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <fieldset id="buildyourform5">
                    <input type="file" name="photo_example[]" id="photo_example2" style="width: 80%">
                    </fieldset>
                  <input type="button" value="+Tambah" id="add5" class="btn btn-secondary" style="margin-top: 2%" />
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-12">
                    <h5>Syarat</h5>
                  </div>
                </div>
                <div class="row" style="margin-top: 1%">
                  <div class="col-md-12">
                    <textarea class="form-control" placeholder="Influencer seperti apa yang kamu cari?" name="syarat"></textarea>
                  </div>
                </div>
                <div class="row" style="margin-top: 2%">
                  <div class="col-md-10"></div>
                  <div class="col-md-2 text-right">
                    <input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                                @php
                            }
                            @endphp
                                <input type="text" name="campaign" placeholder="Cari campaignmu" style="height: 50px;padding-left: 2%;width: 70%">
                                <input type="button" name="search" class="btn" value="?">
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <br>
                        <!-- Pesan Error -->
                        @if(count($errors)>0)
                        <h4 class="text-danger mb-2">Proses Membuat Campaign Gagal !</h4>
                          @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                          @endforeach
                        @endif
                        <div class="row" style="margin-top: 5%">
  
                            {{-- <div class="col-lg-">
                            </div> --}}
                            
                            @foreach($list_campaign as $row)
                            <div class="col-lg-11">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                      <div class="row">
                                          <div class="col-md-2">
                                              <img src="/images/campaign/{{$row->photo_campaign}}">
                                          </div>
                                          <div class="col-md-3">
                                              <h4>{{$row->nama}}</h4>
                                              
                                              <p>Status : 

                                                @if($row->status_campaign==1)
                                                Posted
                                                @endif
                                                @if($row->status_campaign==2)
                                                Campaign Selesai
                                                @endif
                                              </p>
                                              <p>Tipe : 
                                                @php
                                                if($row->tipe==0){
                                                  echo 'Open';
                                                }
                                                else{
                                                  echo 'Private';
                                                }
                                                @endphp
                                              </p>
                                          </div>
                                          <div class="col-md-2" style="padding-top: 3%">
                                              <div class="au-card" style="padding: 10px">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    Biaya
                                                  </div>
                                                </div>
                                                <div class="row" style="margin-top: 25%">
                                                  <div class="col-md-1">
                                                    Rp
                                                  </div>
                                                  <div class="col-md-9 text-right">
                                                    {{$row->biaya}}
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                           <div class="col-md-2" style="padding-top: 3%">
                                              <div class="au-card" style="padding: 10px">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    Jenis
                                                  </div>
                                                </div>
                                                <div class="row" style="margin-top: 25%">
                                                  <div class="col-md-12 text-right">
                                                    @php
                                                    if($row->jenis == 0){
                                                      echo 'Post';
                                                    }
                                                    else{
                                                      echo 'Instastory';
                                                    }
                                                    @endphp
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="col-md-2" style="padding-top: 9%">
                                              
@php
if($row->tipe==1 && Session::get('role')==1){
@endphp
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cariInfluencer{{$row->id_campaign}}">
  Detail
</button>

<!-- Modal -->
<div class="modal fade" id="cariInfluencer{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h3>Cari Influencer</h3>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          @php
          $cek_avail = DB::table('campaign_process')->where('id_campaign',$row->id_campaign)->count();
          if($cek_avail==0){
          @endphp
          <div class="col-md-12 text-center">
            <p>Kamu belum menambahkan influencer dalam campaignmu. Gunakan Filter pada halaman Influencer, untuk menemukan influencer yang tepat dengan produkmu.</p>
          </div>
          @php
          }else{
          @endphp
          @php
        $influencer = DB::table('campaign_process')->join('users','users.id','=','campaign_process.id_user')->join('influencer','influencer.id','=','users.id')->where('campaign_process.id_campaign',$row->id_campaign)->get(['users.name','users.photo','influencer.*','campaign_process.*']);
        $total_biaya = count($influencer)*$row->biaya;
        @endphp
        @foreach($influencer as $row_f)
        <div class="row">
          <div class="col-md-2">
            <div class="row">
              <div class="col-md-12">
                <img src="/images/profile/{{$row_f->photo}}" class="img-thumbnail" style="height: 120px">
              </div>
              <div class="col-md-12">
                @php
                  if($row->payment==0){
                  if($row_f->status==0){
                    @endphp
                    <form action="/dashboard/acceptance" style="margin-top: 5%" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_process" value="{{$row_f->id_process}}">
                      <input type="submit" name="accept" value="Setujui" class="btn btn-secondary form-control">
                    </form>
                    @php
                  }else if($row_f->status==1){
                    @endphp
                    <form action="/dashboard/acceptance" style="margin-top: 5%" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_process" value="{{$row_f->id_process}}">
                      <input type="submit" name="cancel" value="Disetujui" class="btn btn-primary form-control">
                    </form>
                    @php
                  }
                }else if($row->payment==1){
                  @endphp
                  <button type="button"  style="margin-top: 5%" class="btn btn-primary" data-toggle="modal" data-target="#detail{{$row->id_campaign.'-'.$row_f->id_user}}" data-dismiss="modal">
                    Detail
                  </button>
                  @php
                }
                @endphp 
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row"  style="margin-top: 2%">
              <div class="col-md-12">
                <h4>{{'@'.$row_f->username}}</h4>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <p>{{$row_f->name}}</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <p>Jakarta selatan</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              @php
              $tag = DB::table('tag')->join('master_tag','master_tag.id_master','=','tag.id_master')->where('id_user',$row_f->id)->get(['deskripsi']);
              @endphp
              @foreach($tag as $row2)
              <div class="col-md-5">
                <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p style="font-size: 12px">Followers</p>
              </div>
              <div class="col-md-4">
                <p  style="font-size: 12px">Likes rata-rata</p>
              </div>
              <div class="col-md-4">
                <p style="font-size: 12px">Komentar rata-rata</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h3>{{$row_f->follower}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->follower}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->follower}}</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p style="font-size: 12px">Following</p>
              </div>
              <div class="col-md-4">
                <p  style="font-size: 12px">View instastories</p>
              </div>
              <div class="col-md-4">
                <p style="font-size: 12px">Reach Postingan</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h3>{{$row_f->following}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->following}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->following}}</h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
          @php
          }
          @endphp
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 text-center">
            <a href="/dashboard/influencer/{{$row->id_campaign}}"><button class="btn btn-primary form-control">Cari Influencer</button></a>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@php
}else{
@endphp
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal{{$row->id_campaign}}">
  Detail
</button>
@php
}
@endphp

<!-- Modal -->
@php
if(Session::get('role')==2){
@endphp
<div class="modal fade" id="detailModal{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row"  style="margin-top: 2%">
          <div class="col-md-12">
            <h3>{{$row->nama}}</h3>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h4>{{$row->name}}</h4>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
            @php
            $tag = DB::table('produk_tag')->join('master_tag','master_tag.id_master','=','produk_tag.id_master')->where('id_campaign',$row->id_campaign)->get(['deskripsi']);
            @endphp
            @foreach($tag as $row_tag)
            <div class="col-md-2  ">
                <input type="text" name="tag[]" value="{{$row_tag->deskripsi}}" class="form-control" disabled>
              </div>
            @endforeach
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-6">
            <p>Produk</p>
          </div>
          <div class="col-md-6">
            <p>Jenis</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-6">
            <h4>{{$row->produk}}</h4>
          </div>
          <div class="col-md-6">
            <h4>
              @php
              if($row->jenis==0){
                echo 'Post';
              }
              else{
                echo 'Instastory';
              }
              @endphp
            </h4>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          @php
          $photo_example = DB::table('photo_example')->where('id_campaign',$row->id_campaign)->get(['filename']);
          @endphp
          @foreach($photo_example as $row_photo)
          <div class="col-md-3">
            <img src="/images/example/{{$row_photo->filename}}" class="img-thumbnail" style="height: 120px" >
          </div>
          @endforeach
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h5>Request Note</h5>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <p>{{$row->syarat}}</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h5>Deskripsi</h5>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <p>{{$row->deskripsi}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <p style="font-size: 11px">Yang kamu dapatkan</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-6">
            Rp {{$row->biaya}}
          </div>
          <div class="col-md-6">
            @php
            if($row->tipe==0){
              if($row->status==0){
                echo 'Menunggu Persetujuan';
              }
              else if($row->status==1){
                @endphp
                <span style="color: green;margin-right: 50%">Disetujui</span>

                @php
                if($row->payment==1){
                  @endphp

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postModal{{$row->id_campaign}}" data-dismiss="modal">
                  Next
                </button>
                  @php
                } 
                @endphp
                @php
              }
              else{
                echo 'Ditolak';
              }
            }
            else{
            @endphp
              <form action="/dashboard/acceptance" method="POST">
                <input type="submit" name="accept" value="Setujui" class="btn btn-primary" style="width: 40%">
                <input type="submit" name="refuse" value="Tolak" class="btn btn-secondary" style="width: 40%">
              </form>
            @php
            }
            @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@php
  if($row->status==1){

@endphp
<div class="modal fade" id="postModal{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row">
          <div class="col-md-12">
            <h3>Masukkan link postingan</h3>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          @php
          if($row->shortcode==''){
          @endphp  
          <div class="col-md-4">
            <img src="/images/icon/post.png" class="img-thumbnail" width="100%">
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <h5>Link Postingan</h5>
              </div>
            </div>
            <form action="/dashboard/campaign_progress" method="POST">
            <div class="row">
              <div class="col-md-12" style="margin-top: 2%">
                {{ csrf_field() }}
                <input type="hidden" name="id_process" value="{{$row->id_process}}">
                <input type="text" name="link" placeholder="Link postingan" class="form-control">
              </div>
              <div class="col-md-4" style="margin-top: 2%">
                <input type="submit" name="submit_link" value="Perbarui" class="btn btn-primary">
              </div>
            </div>
            </form>
          </div>
          @php
        }else{
          @endphp
          <div class="col-md-4">
            {{-- <img src="{{$row->url_photo}}" class="img-thumbnail" width="100%"> --}}
            <a href="https://www.instagram.com/p/{{$row->shortcode}}" target="_blank"><button style="margin-top: 15%" class="btn btn-success">Lihat foto</button></a>
          </div>
        <div class="col-md-8">
            <form action="/dashboard/campaign_progress" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <h5>Link Postingan</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="hidden" name="id_process" value="{{$row->id_process}}">
                <input type="text" name="link" placeholder="Link postingan" class="form-control" value="{{$row->shortcode}}" @if($row->status_campaign==2) disabled @endif>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Likes</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="likes" class="form-control" value="{{$row->likes}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Komentar</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="comments" class="form-control" value="{{$row->comments}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Share</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="share" class="form-control" value="{{$row->share}}" @if($row->status_campaign==2) disabled @endif>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jangkauan</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="jangkauan" class="form-control" value="{{$row->jangkauan}}" @if($row->status_campaign==2) disabled @endif>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Bukti Screenshot</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="file" name="bukti" class="form-control" @if($row->status_campaign==2) disabled @endif>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-4" >
                @if($row->status_campaign==1)
                <input type="submit" name="submit_link" value="Perbarui" class="btn btn-primary">
                @endif
              </div>
            </div>
            </form>
          </div>
        @php
        }
        @endphp
        </div>
      </div>
    </div>
  </div>
</div>

@php
}
} else{
@endphp
<div class="modal fade" id="detailModal{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h3>Pendaftar</h3>
          </div>
        </div>
        @php
        $influencer = DB::table('campaign_process')->join('users','users.id','=','campaign_process.id_user')->join('influencer','influencer.id','=','users.id')->where('campaign_process.id_campaign',$row->id_campaign)->get(['users.name','users.photo','influencer.*','campaign_process.*']);
        $total_biaya = count($influencer)*$row->biaya;
        @endphp
        @foreach($influencer as $row_f)
        <div class="row" style="margin-top: 2%">
          <div class="col-md-2">
            <div class="row">
              <div class="col-md-12">
                <img src="/images/profile/{{$row_f->photo}}" class="img-thumbnail" style="height: 120px">
              </div>
              <div class="col-md-12">
                @php
                  if($row->payment==0){
                  if($row_f->status==0){
                    @endphp
                    <form action="/dashboard/acceptance" style="margin-top: 5%" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_process" value="{{$row_f->id_process}}">
                      <input type="submit" name="accept" value="Setujui" class="btn btn-secondary form-control">
                    </form>
                    @php
                  }else if($row_f->status==1){
                    @endphp
                    <form action="/dashboard/acceptance" style="margin-top: 5%" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_process" value="{{$row_f->id_process}}">
                      <input type="submit" name="cancel" value="Disetujui" class="btn btn-primary form-control">
                    </form>
                    @php
                  }
                }else if($row->payment==1){
                  @endphp
                  <button type="button"  style="margin-top: 5%" class="btn btn-primary" data-toggle="modal" data-target="#detail{{$row->id_campaign.'-'.$row_f->id_user}}" data-dismiss="modal">
                    Detail
                  </button>
                  @php
                }
                @endphp 
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row"  style="margin-top: 2%">
              <div class="col-md-12">
                <h4>{{'@'.$row_f->username}}</h4>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <p>{{$row_f->name}}</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <p>Jakarta selatan</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              @php
              $tag = DB::table('tag')->join('master_tag','master_tag.id_master','=','tag.id_master')->where('id_user',$row_f->id)->get(['deskripsi']);
              @endphp
              @foreach($tag as $row2)
              <div class="col-md-5">
                <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p style="font-size: 12px">Followers</p>
              </div>
              <div class="col-md-4">
                <p  style="font-size: 12px">Likes rata-rata</p>
              </div>
              <div class="col-md-4">
                <p style="font-size: 12px">Komentar rata-rata</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h3>{{$row_f->follower}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->likes}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->comments}}</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p style="font-size: 12px">Following</p>
              </div>
              <div class="col-md-4">
                <p  style="font-size: 12px">View instastories</p>
              </div>
              <div class="col-md-4">
                <p style="font-size: 12px">Reach Postingan</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h3>{{$row_f->following}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->instastory}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row_f->reach}}</h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="row" style="margin-top: 4%">
          <div class="col-md-12">
            <p style="font-size: 11px">Estimasi Biaya</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-6">
            <h4>Rp {{$total_biaya}}</h4>
          </div>
          <div class="col-md-6 text-right">
            @php
            if($row->payment==0){
              @endphp
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayarCampaign{{$row->id_campaign}}" data-dismiss="modal">
                Next
              </button>
              @php
            }else if($row->payment==1 && $row->status_campaign==1){
              @endphp
              <form action="/dashboard/done" method="POST">
              @csrf
              <input type="hidden" name="id_campaign" value="{{$row->id_campaign}}">
              <button type="submit" class="btn btn-success" >
                Selesai
              </button>
              </form>
              @php
            }
            @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@php
if($row->payment==1){
@endphp

@foreach($influencer as $row_f)
<div class="modal fade" id="detail{{$row->id_campaign.'-'.$row_f->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-toggle="modal" data-target="#detailModal{{$row->id_campaign}}" data-dismiss="modal" class="close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row" style="margin-top: 2%">
          <div class="col-md-4">
            {{-- <img src="{{$row_f->url_photo}}" class="img-thumbnail" width="100%"> --}}
            <a href="https://www.instagram.com/p/{{$row_f->shortcode}}" target="_blank"><button style="margin-top: 15%" class="btn btn-success">Lihat foto</button></a>
          </div>
        <div class="col-md-8">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <h5>Link Postingan</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="link" placeholder="Link postingan" class="form-control" value="{{$row_f->shortcode}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Likes</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="likes" class="form-control" value="{{$row_f->likes}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Komentar</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="comments" class="form-control" value="{{$row_f->comments}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jumlah Share</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="share" class="form-control" value="{{$row_f->share}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Jangkauan</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-12">
                <input type="text" name="jangkauan" class="form-control" value="{{$row_f->jangkauan}}" disabled>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
              <div class="col-md-12">
                <h5>Bukti Screenshot</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-10">
                <input type="text" name="bukti" value="{{$row_f->bukti}}" class="form-control" disabled>
              </div>
              <div class="col-md-2">
                <a href="/images/bukti/{{$row_f->bukti}}" target="_blank"><button class="btn btn-primary form-control">Lihat</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@php
}
@endphp

@php
if($row->payment==0){
@endphp
<!-- Modal -->
<div class="modal fade" id="bayarCampaign{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        timeline
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <h4>Pembayaran</h4>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12">
            <p>Biaya</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12 text-right">
            <h3>Rp{{$total_biaya}}</h3>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-12 text-right">
            <p>Lakukan pembayaran dengan cara mengcopy link di bawah ini atau dengan cara menekan tombol 'Bayar'</p>
          </div>
        </div>
        <div class="row" style="margin-top: 2%">
          <div class="col-md-10">
            <input type="text" name="bayar" disabled value="https://checkout.xendit.co/web/60af34c03dcd5d401bbcbd15" class="form-control">
          </div>
          <div class="col-md-2">
            <form action="/dashboard/payment" method="POST">
            @csrf
            <input type="hidden" name="id_campaign" value="{{$row->id_campaign}}">
            <button type="submit" class="form-control btn btn-primary">
              Bayar
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@php
}
}
@endphp

                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            @endforeach
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection