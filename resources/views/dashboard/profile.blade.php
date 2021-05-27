@extends('dashboard/template')

@section('title','Profil')

@section('profile','active')

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
                                                $i=0;
                                                foreach ($daerah as $row) {
                                                    if($i!=count($daerah)-1){
                                                        echo $row->daerah.', ';    
                                                    }
                                                    else{
                                                        echo $row->daerah;       
                                                    
                                                    }  
                                                    $i++;
                                                }
                                            }
                                            else{
                                                echo '<span style="color: red">Belum menambah daerah</span>';
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
        <form action="/dashboard/profile" method="POST">
        @csrf
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
                        <input type="text" name="name" value="{{$all->name}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Akun Instagram</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="username" value="{{$all->username}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Followers</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="follower" value="{{$all->follower}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Following</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="following" value="{{$all->following}}" class="form-control" disabled>
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
                            <option value="0" @if($all->tipe_bank==0) selected @endif>BCA</option>
                            <option value="1" @if($all->tipe_bank==1) selected @endif>Mandiri</option>
                            <option value="2" @if($all->tipe_bank==2) selected @endif>BRI</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="norek" value="{{$all->norek}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Nomor Whatsapp</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="no_hp" value="{{$all->no_hp}}" class="form-control">
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
                        <input type="number" name="likes" value="{{$all->likes}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata komentar</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="comments" value="{{$all->comments}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata share</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="share" value="{{$all->share}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata reach</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="reach" value="{{$all->reach}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata views instastory</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="instastory" value="{{$all->instastory}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Rata-rata engagement</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="engagement" value="{{$all->engagement}}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Lokasi follower</p>
                    </div>
                </div>
                @php
                $daerah = DB::table('daerah_user')->where('id', Auth::id())->get();
                if(count($daerah)){
                @endphp
                    @for($i=0;$i<count($daerah);$i++)
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="number" name="percent[]" value="{{ $daerah[$i]->percent }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" value="{{ $daerah[$i]->daerah }}" class="form-control">
                        </div>
                    </div>
                    @endfor
                    @for($i=count($daerah);$i<5;$i++)
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6" >
                            <input type="number" name="percent[]" value="" class="form-control" placeholder="persentase">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    @endfor
                @php
                }else{
                @endphp
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="number" name="percent[]" value="" class="form-control" placeholder="persentase">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="number" name="percent[]" class="form-control" placeholder="persentase">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="number" name="percent[]" class="form-control" placeholder="persentase">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="number" name="percent[]" class="form-control" placeholder="persentase">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                @php
                }
                @endphp
            </div>
        </div>
        <button type="submit" value="simpan" class="btn btn-success my-4">Simpan</button>
        </form>
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
                                <h2>{{$all->post}}</h2>
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
                                <h2>{{$all->likes}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->comments}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->share}}</h2>
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
                                <h2>{{$all->reach}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->instastory}}</h2>
                            </div>
                            <div class="col-lg-3">
                                <h2>{{$all->engagement}}</h2>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 4%">
                            <div class="col-lg-3">
                                Lokasi Follower
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1%">
                            <div class="col-lg-12">
                                @php
                                if(count($daerah)){
                                @endphp
                                @foreach ($daerah as $item)
                    <div class="row" style="margin-top: 2%">
                        <div class="col-lg-3">
                            <h3>{{ $item->percent }}%</h3>
                        </div>
                        <div class="col-lg-3">
                            <h3>{{ $item->daerah }}</h3>
                        </div>
                    </div>
                    @endforeach
                                @php
                            }else{
                                @endphp
                            <span style="color: red">Belum menambah daerah</span>
                            @php
                            }
                            @endphp
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection