@extends('dashboard/template')

@section('title','Dashboard')

@section('dashboard','active')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner" style="margin-bottom: 5%">
                                        <h3 class="title-2">Masukkan Data Profile</h3>
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="col-md-2"></div><div class="col-md-10" style="color: red">{{ $errors->first('password') }}</div>
                                    @endif
                                    @if($errors->has('photo'))
                                        <div class="col-md-2"></div><div class="col-md-10" style="color: red">{{ $errors->first('photo') }}</div>
                                    @endif
                                    @if($errors->has('no_hp'))
                                        <div class="col-md-2"></div><div class="col-md-10" style="color: red">{{ $errors->first('no_hp') }}</div>
                                    @endif
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                         <div class="col-lg-6">
                                            <input type="file" name="photo" class="form-control">
                                        </div>
                                        <div class="col-lg-6">
                                            <p>Buat Password</p>
                                            <input type="password" name="password" class="form-control">
                                            <p>Konfirmasi Password</p>
                                            <input type="password" name="password_confirmation" class="form-control">
                                            <p>Nomor Handphone</p>
                                            <input type="text" name="no_hp" class="form-control">
                                            <div class="row" style="margin-top: 5%">
                                                <div class="col-lg-7"></div>
                                                <div class="col-lg-4">
                                                    <input type="submit" name="submit" value="Lanjutkan" style="margin-top: 5%" class="btn btn-primary">
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3">
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
@endsection