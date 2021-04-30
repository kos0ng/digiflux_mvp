@extends('dashboard/template')

@section('title','Dashboard')

@section('influencer','active')

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
                                <select style="height: 50px;width: 20%">
                                  <option>Tidak ada campaign</option>
                                </select>
                                <input type="text" name="campaign" placeholder="Cari Influencer" style="height: 50px;padding-left: 2%;width: 70%">
                                <input type="button" name="search" class="btn" value="?">
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5%">
                            @foreach($list_influencer as $row)
                            <div class="col-lg-4">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                      <div class="row">
                                          <div class="col-md-5">
                                              <img src="/images/profile/{{$row->photo}}">
                                          </div>
                                          <div class="col-md-7">
                                              <h4>{{'@'.$row->username}}</h4>
                                              <p>{{$row->nama}}</p>
                                              <p>Tangerang</p>
                                          </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        @php
                                        $tag = DB::table('tag')->join('master_tag','master_tag.id_master','=','tag.id_master')->where('id_user',$row->id)->get(['deskripsi']);
                                        @endphp
                                        @foreach($tag as $row2)
                                        <div class="col-md-6">
                                          <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
                                        </div>
                                        @endforeach
                                      </div>
                                      <div class="row" style="margin-top: 7%">
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Followers</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Following</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->follower}}</h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->following}}</h2>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Engagement Rate</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Likes rata-rata</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->follower}}</h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->following}}</h2>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">View Instastories</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Komentar rata-rata</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->follower}}</h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->following}}</h2>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-7">
                                          <form action="/dashboard/influencer" method="POST">
                                          {{ csrf_field() }}
                                          @php
                                          if(isset($id_campaign)){
                                            @endphp
                                            <input type="hidden" name="id_campaign" value="{{$id_campaign}}">
                                            @php
                                          }else{
                                            @endphp
{{--                                             <select name="id_campaign" class="form-control">
                                              <option value="0">pilihan campaign</option>
                                            </select> --}}
                                            @php  
                                          }
                                          @endphp
                                            <input type="hidden" name="id_user" value="{{$row->id}}">
                                            <input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">
                                            </form>
                                        </div>
                                        <div class="col-md-5">
                                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail{{$row->id}}">
  Detail
</button>
                                          <!-- Modal -->
<div class="modal fade" id="detail{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <img src="/images/profile/{{$row->photo}}">
          </div>
          <div class="col-md-4">
            <h4>{{'@'.$row->username}}</h4>
            <p>{{$row->nama}}</p>
            <p>Tangerang</p>
            </div>
          <div class="col-md-5">
            <div class="row">
              @foreach($tag as $row2)
              <div class="col-md-5">
                <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
              </div>
              @endforeach
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-10">
                                          <form action="/dashboard/influencer" method="POST">
                                            {{ csrf_field() }}
                                          @php
                                          if(isset($id_campaign)){
                                            @endphp
                                            <input type="hidden" name="id_campaign" value="{{$id_campaign}}">
                                            @php
                                          }else{
                                            @endphp
{{--                                             <select name="id_campaign" class="form-control">
                                              <option value="0">pilihan campaign</option>
                                            </select> --}}
                                            @php  
                                          }
                                          @endphp
                                            <input type="hidden" name="id_user" value="{{$row->id}}">
                                            <input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">
                                            </form>
                                        </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 4%">
          <div class="col-md-3">
            <div class="row" style="margin-bottom: 7%">
              <div class="col-md-12">
                <h5>Instastories</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <img src="/images/profile/{{$row->photo}}">
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="row" style="margin-bottom: 2%">
              <div class="col-md-12">
                <h5>Post</h5>
              </div>
            </div>
            <div class="row">
                 <div class="col-md-3">
              <img src="/images/profile/{{$row->photo}}">
            </div>
            <div class="col-md-3">
              <img src="/images/profile/{{$row->photo}}">
            </div>
            <div class="col-md-3">
              <img src="/images/profile/{{$row->photo}}">
            </div>
            <div class="col-md-3">
              <img src="/images/profile/{{$row->photo}}">
            </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-4">
                <p>Post</p>
              </div>
              <div class="col-md-4">
                <p>Follower</p>
              </div>
              <div class="col-md-4">
                <p>Following</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-4 text-right">
                <h3>{{$row->following}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row->follower}}</h3>
              </div>
              <div class="col-md-4 text-right">
                <h3>{{$row->following}}</h3>
              </div>
            </div>
            
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6">
                <p>likes rata-rata</p>
              </div>
              <div class="col-md-6">
                <p>komentar rata-rata</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6 text-right">
                <h3>{{$row->following}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->follower}}</h3>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6">
                <p>Rata-rata share</p>
              </div>
              <div class="col-md-6">
                <p>Rata-rata views instastory</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6 text-right">
                <h3>{{$row->following}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->follower}}</h3>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6">
                <p>Rata-rata reach</p>
              </div>
              <div class="col-md-6">
                <p>Rata-rata engagements</p>
              </div>
            </div>
            <div class="row" style="margin-top: 2%">
              <div class="col-md-6 text-right">
                <h3>{{$row->following}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->follower}}</h3>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6">
                  <p>Lokasi Follower</p>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-7">
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                      (22.000)
                    </div>
                    <div class="col-md-3">
                      Kota
                    </div>
                  </div>
                  <div class="row" style="margin-top: 2%">
                    <div class="col-md-7">
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                      (22.000)
                    </div>
                    <div class="col-md-3">
                      Kota
                    </div>
                  </div>
                  <div class="row" style="margin-top: 2%">
                    <div class="col-md-7">
                      <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-md-2">
                      (22.000)
                    </div>
                    <div class="col-md-3">
                      Kota
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
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection