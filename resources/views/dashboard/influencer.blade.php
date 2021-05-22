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
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#filter">
                                  <i class="fas fa-sliders-h"></i>
                                </button>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5%" id="list-influencer">
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

            <!-- Modal -->
            <div class="modal fade" id="filter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="filterLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="/dashboard/filter_influencer" method="post" id="filter-form">
                  <div class="modal-header">
                    <h1 class="modal-title" id="staticBackdropLabel">Filter</h1>
                  </div class="col">
                  <div class="modal-body">
                      <div class="col-md-6">
                      <label for="tag">Tag</label>
                      <select value="tag" class="mul-select col filter" id="filter-tag">
                        {{--  @foreach ($tags as $tag )
                        <option value="{{ $tag->id_master }}">{{ $tag->deskripsi }}</option>
                        @endforeach  --}}

                        <option value="foodist">foodist</option>
                        <option value="lifestyle">lifestyle</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="jeniskelamin">Jenis Kelamin</label>
                      <select value="jeniskelamin" class="mul-select col filter" id="filter-gender">
                        {{--  @foreach ($users as $user )
                        <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                        @endforeach
                      </select>  --}}
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="kota">Kota / Kabupaten</label>
                      <select value="kota" class="mul-select col filter" id="filter-kota">
                        <option value="1">Lamongan</option>
                        <option value="2">Surabaya</option>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="range">Rentang Followers</label>
                      <div class="input-group">
                        <input type="number" name="rangeMinFollowers" id="range-min-followers" placeholder="Min" class="form-control filter">
                        <input type="number" name="rangeMaxFollowers" id="range-max-followers" placeholder="Max" class="form-control filter">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="usia">Rentang Usia</label>
                      <div class="input-group sm-2">
                        <input type="number" name="rangeMinAge" id="range-min-age" placeholder="Min" class="form-control filter">
                        <input type="number" name="rangeMaxAge" id="range-max-age" placeholder="Max" class="form-control filter">
                      </div>
                    </div>    
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitFilter">Apply</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

@endsection

@section('filter-influencer')
<script type="text/javascript">
  {{--  $(document).on('click','#submitFilter', function(e){
    e.preventDefault();
    var all_tags = []
    var checked_tags = []
    var tags = $("input[name='filter_tag[]']").each(function() {
      all_tags.push(this.value)
      if (this.checked) { checked_tags.push(this.value) }
    });
    let tag = $("#filter-tag").val()
    let gender = $("#filter-gender").val()
    let kota = $("#filter-kota").val()

    //console.log([checked_tags,min_biaya,deadline])

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('filter_influencer') }}",
        type: "POST",
        data: {tag, gender, kota},
        success: function(d){
          console.log(d);
          $('div').html(d)
          $("input[name='filter_tag[]']").each(function() {
            if (checked_tags.includes(this.value)) { this.checked = true }
          });
          $("#min_biaya").val(min_biaya)
          $("#deadline").val(deadline)
        }

    }); 
  });  --}}

  const form = document.querySelector("#filter-form");
  form.addEventListener("submit", function(event){

    event.preventDefault();
  
    

    fetch("{{ route('filter_influencer') }}", {
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Content-Type' : 'application/json'
      },
      method : "POST",
      body : JSON.stringify({
        tag : event.target["filter-tag"].value,
        gender : event.target["filter-gender"].value,
        kota : event.target["filter-kota"].value,
        minFollower : event.target["range-min-followers"].value,
        maxFollower : event.target["range-max-followers"].value,
        minAge : event.target["range-min-age"].value,
        maxAge : event.target["range-max-age"].value
      })
    }).then(function(response){
      return response.json()
    }).then(function(responseJson){
      console.log(responseJson)
      $("#filter").modal("hide")

      const container = document.querySelector("#list-influencer")
      container.innerHTML = ""
      responseJson["list_campaign"].forEach(function(campaign) {
        container.innerHTML += `
      <div class="col-lg-4">
        <div class="au-card recent-report">
            <div class="au-card-inner">
                <div class="row">
                    <div class="col-md-5">
                        <img src="/images/profile/${campaign.photo_campaign}">
                    </div>
                    <div class="col-md-7">
                        <h4>${campaign.name}</h4>
                        <p>${campaign.nama}</p>
                        <p>${responseJson.kota}</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-6">
                        <input type="text" name="tag[]" value="Lifestyle" class="form-control" disabled="">
                    </div>
                </div>
                <div class="row" style="margin-top: 7%">
                    <div class="col-md-6">
                        <p style="font-size: 12px">Followers</p>
                    </div>
                    <div class="col-md-6">
                        <p style="font-size: 12px">Following</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>356</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>17</h2>
                    </div>
                    <div class="col-md-6">
                        <p style="font-size: 12px">Engagement Rate</p>
                    </div>
                    <div class="col-md-6">
                        <p style="font-size: 12px">Likes rata-rata</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>356</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>17</h2>
                    </div>
                    <div class="col-md-6">
                        <p style="font-size: 12px">View Instastories</p>
                    </div>
                    <div class="col-md-6">
                        <p style="font-size: 12px">Komentar rata-rata</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>356</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <h2>17</h2>
                    </div>
                </div>
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-7">
                        <form action="/dashboard/influencer" method="POST">
                            <input type="hidden" name="_token" value="g8E285CoexNH16tbuon9SKvzqUcBezCNNKT7QsiM">
    
                            <input type="hidden" name="id_user" value="13">
                            <input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detail13">
                            Detail
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="detail13" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: 25%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="/images/profile/1617181751.jpg">
                                            </div>
                                            <div class="col-md-4">
                                                <h4>@madl33ts</h4>
                                                <p>Jack Sparrow</p>
                                                <p>Tangerang</p>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="text" name="tag[]" value="Lifestyle"
                                                            class="form-control" disabled="">
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 2%">
                                                    <div class="col-md-10">
                                                        <form action="/dashboard/influencer" method="POST">
                                                            <input type="hidden" name="_token"
                                                                value="g8E285CoexNH16tbuon9SKvzqUcBezCNNKT7QsiM">
    
                                                            <input type="hidden" name="id_user" value="13">
                                                            <input type="submit" name="submit" value="Tambahkan"
                                                                class="btn btn-primary">
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
                                                        <img src="/images/profile/1617181751.jpg">
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
                                                        <img src="/images/profile/1617181751.jpg">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="/images/profile/1617181751.jpg">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="/images/profile/1617181751.jpg">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="/images/profile/1617181751.jpg">
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
                                                        <h3>17</h3>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <h3>356</h3>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <h3>17</h3>
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
                                                        <h3>17</h3>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <h3>356</h3>
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
                                                        <h3>17</h3>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <h3>356</h3>
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
                                                        <h3>17</h3>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <h3>356</h3>
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
                                                            <div class="col-md-7" <input type="text" name=""
                                                                class="form-control">
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
      `
      })
    })
  })

  


  </script>

@endsection