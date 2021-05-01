@extends('dashboard/template')

@section('title','Profil')

@section('profile','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Profile</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 2%">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="/images/profile/{{$all->photo}}">  
                                    </div>  
                                    <div class="col-md-7">
                                        <h3>{{'@'.$all->username}}</h3>
                                        <p>{{$all->name}}</p>
                                        <p>
                                            @php
                                            if(count($daerah)){
                                                foreach ($daerah as $row) {
                                                    echo $row['daerah'];
                                                }
                                            }
                                            else{
                                                echo 'Belum menambah daerah';
                                            }
                                            @endphp
                                        </p>
                                        <div class="row" style="margin-top: 2%">
                                        @php
                                        $tag = DB::table('tag')->join('master_tag','master_tag.id_master','=','tag.id_master')->where('id_user',Session::get('id'))->get(['deskripsi']);
                                        @endphp
                                        @foreach($tag as $row2)
                                        <div class="col-md-3">
                                          <input type="text" name="tag[]" value="{{$row2->deskripsi}}" class="form-control" disabled>
                                        </div>
                                        @endforeach
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editProfile">
  Pengaturan
</button>
                                    </div>
                                    <!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Pengaturan</h3>
        <div class="row" style="margin-top: 5%">
            <div class="col-md-3">
                <img src="/images/profile/{{$all->photo}}">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <p>Nama</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Akun Instagram</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="username" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Followers</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="follower" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Following</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="following" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Bank</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-control" name="bank">
                            <option>Bank</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="norek" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Nomor Whatsapp</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="nohp" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-9">
                 <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata likes</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="likes" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata komentar</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="comments" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata share</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="share" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata views instastory</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="instastory" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata engagement</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="engagement" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Lokasi follower</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="percent[]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="daerah[]" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="percent[]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="daerah[]" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="percent[]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="daerah[]" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="percent[]" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="daerah[]" class="form-control">
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
                            <div class="col-lg-3">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%">
                            <div class="col-lg-3">
                                <h4>Post</h4>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1%">
                            <div class="col-lg-2">
                                <img src="/images/profile/{{$all->photo}}">
                            </div>
                            <div class="col-lg-2">
                                <input type="file" name="photo_portofolio">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 4%">
                            <div class="col-lg-3">
                                Post
                            </div>
                            <div class="col-lg-3">
                                Jumlah Follower
                            </div>
                            <div class="col-lg-3">
                                Following
                            </div>
                        </div>
                        <div class="row text-right" style="margin-top: 1%">
                            <div class="col-lg-3">
                                <h2>120</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->follower}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->following}}</h2>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 4%">
                            <div class="col-lg-3">
                                likes rata-rata
                            </div>
                            <div class="col-lg-3">
                                komentar rata-rata
                            </div>
                            <div class="col-lg-3">
                                rata-rata share
                            </div>
                        </div>
                        <div class="row text-right" style="margin-top: 1%">
                            <div class="col-lg-3">
                                <h2>120</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->follower}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->following}}</h2>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 4%">
                            <div class="col-lg-3">
                                Rata-rata reach
                            </div>
                            <div class="col-lg-3">
                                Rata-rata views instastory
                            </div>
                            <div class="col-lg-3">
                                Rata-rata engagement
                            </div>
                        </div>
                        <div class="row text-right" style="margin-top: 1%">
                            <div class="col-lg-3">
                                <h2>120</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->follower}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->following}}</h2>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 4%">
                            <div class="col-lg-3">
                                Lokasi Follower
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1%">
                            <div class="col-lg-3">
                                Scrap
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection