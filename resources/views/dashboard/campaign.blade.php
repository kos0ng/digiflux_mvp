@extends('dashboard/template')

@section('title','Dashboard')

@section('campaign','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Influencer</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%">
                            <div class="col-md-12">
                                <input type="text" name="campaign" placeholder="Cari Campaignmu" style="height: 50px;padding-left: 2%;width: 70%">
                                <input type="button" name="search" class="btn" value="?">
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5%">
                            @foreach($list_campaign as $row)
                            <div class="col-lg-4">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                      <div class="row">
                                          <div class="col-md-12 text-center">
                                              <img src="/images/campaign/{{$row->photo_campaign}}" style="height: 200px">
                                          </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-12">
                                          <h2>{{$row->nama}}</h2>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-12">
                                          <h4>{{$row->name}}</h4>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-12">
                                          <p style="font-size: 18px">Pendapatan : {{$row->biaya}}</p>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-12">
                                          <p>{{$row->deskripsi}}</p>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-8">
                                          <form method="post" action="/dashboard/register_campaign">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_campaign" value="{{$row->id_campaign}}">
                                            @php
                                            $cek = DB::table('campaign_process')->where([['id_campaign','=',$row->id_campaign],['id_user','=',Session::get('id')]])->count();
                                            @endphp

                                            @php
                                            if($cek == 1){
                                              @endphp
                                              <input type="button" name="daftar" value="Sudah Mendaftar" class="btn btn-secondary form-control" disabled>
                                              @php  
                                            }
                                            else{
                                              @endphp
                                              <input type="submit" name="daftar" value="Daftar" class="btn btn-primary form-control">
                                              @php
                                            }
                                            @endphp
                                          </form>
                                        </div>
                                        <div class="col-md-4">
                                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail{{$row->id_campaign}}">
  Detail
</button>
                                          <!-- Modal -->
<div class="modal fade" id="detail{{$row->id_campaign}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: 25%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <img src="/images/campaign/{{$row->photo_campaign}}">
          </div>
          <div class="col-md-4">
            <h4>{{$row->nama}}</h4>
            <p>{{$row->name}}</p>
            <p>
              @php
              $kota = DB::table('daerah_campaign')->where('id_campaign',$row->id_campaign)->get(['daerah']);
              for($i=0;$i<count($kota);$i++){
                if($i==count($kota)-1){
                  echo $kota[$i]->daerah;
                }
                else{
                  echo $kota[$i]->daerah.', ';
                }
              }
              @endphp
            </p>
            <p>Deadline : {{$row->deadline}}</p>
            </div>
          <div class="col-md-5">
            <div class="row">
              @php
              $tag = DB::table('produk_tag')->join('master_tag','master_tag.id_master','=','produk_tag.id_master')->where('id_campaign',$row->id_campaign)->get(['deskripsi'])
              @endphp
              @foreach($tag as $row2)
              <div class="col-md-5">
                <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
              </div>
              @endforeach
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-lg-10">
                  <form method="post" action="/dashboard/register_campaign">
                    {{ csrf_field() }}
                                            <input type="hidden" name="id_campaign" value="{{$row->id_campaign}}">
                                            @php
                                            $cek = DB::table('campaign_process')->where([['id_campaign','=',$row->id_campaign],['id_user','=',Session::get('id')]])->count();
                                            @endphp

                                            @php
                                            if($cek == 1){
                                              @endphp
                                              <input type="button" name="daftar" value="Sudah Mendaftar" class="btn btn-secondary form-control" disabled>
                                              @php  
                                            }
                                            else{
                                              @endphp
                                              <input type="submit" name="daftar" value="Daftar" class="btn btn-primary form-control">
                                              @php
                                            }
                                            @endphp
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <p>Produk</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 text-right">
                <h2>{{$row->produk}}</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Pendapatan</p>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-4">
                <p>Jenis</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h2>{{$row->biaya}}</h2>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-4 text-right">
                <h2>
                  @php
                  if($row->jenis==0){
                    echo 'Post';
                  }
                  else{
                    echo 'Instastory';
                  }
                  @endphp
                </h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p>Deskripsi</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p>{{$row->deskripsi}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p>Tanggal Post</p>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-4">
                <p>Tanggal Laporan</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 text-right">
                <h2>{{$row->post}}</h2>
              </div>
              <div class="col-md-2">
              </div>
              <div class="col-md-4 text-right">
                <h2>
                  {{$row->laporan}}
                </h2>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12">
                <p>Syarat</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p>{{$row->syarat}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection