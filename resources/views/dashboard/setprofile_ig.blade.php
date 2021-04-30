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
                                    @if($errors->has('username'))
                                        <div class="col-md-2"></div><div class="col-md-10" style="color: red">{{ $errors->first('username') }}</div>
                                    @endif
                                    @if($errors->has('tag'))
                                        <div class="col-md-2"></div><div class="col-md-10" style="color: red">{{ $errors->first('tag') }}</div>
                                    @endif
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Username Instagram</h5>
                                            <input type="text" name="username" class="form-control">
                                            <br>
                                            <h5>Masukkan Tag yang sesuai</h5>
                                            @foreach($list_tag as $row)
                                            <input type="checkbox" name="tag[]" value="{{$row->id_master}}">{{$row->deskripsi}}<br>
                                            @endforeach
                                        </div>
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Next">
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