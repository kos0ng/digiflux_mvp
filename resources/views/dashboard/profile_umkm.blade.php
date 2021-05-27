@extends('dashboard/template')

@section('title','Profil')

@section('profile','active')

@section('home_active','/assets/img/home-not-select.png')

@section('groups_active','/assets/img/groups-icon.png')

@section('user_active','/assets/img/profile-selected.png')

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
                                    <h2 class="title-1">Profil</h2>
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
                                        <h3>{{$all->name}}</h3>
                                        <p>{{$all->no_hp}}</p>
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
        <form action="/dashboard/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Pengaturan</h3>
        <div class="row" style="margin-top: 5%">
            <div class="col-md-3">
                <img src="/images/profile/{{$all->photo}}">
                <input type="file" name="photo" class="form-control">
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
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <p>Cakupan Daerah</p>
                    </div>
                </div>
                @php
                $daerah = DB::table('daerah_user')->where('id', Auth::id())->get();
                if(count($daerah)){
                @endphp
                    @for($i=0;$i<count($daerah);$i++)
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" value="{{ $daerah[$i]->daerah }}" class="form-control">
                        </div>
                    </div>
                    @endfor
                    @for($i=count($daerah);$i<5;$i++)
                    <div class="row" style="margin-top: 2%">
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
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-6">
                            <input type="text" name="daerah[]" class="form-control" placeholder="nama daerah" >
                        </div>
                    </div>
                @php
                }
                @endphp
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" value="simpan" class="btn btn-success my-4">Simpan</button>
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
                            <div class="col-lg-3">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection