@extends('dashboard/template')

@section('title','Dashboard')

@section('influencer','active')

@section('home_active','/assets/img/home-not-select.png')

@section('groups_active','/assets/img/group-selected.png')

@section('user_active','/assets/img/user-icon.png')

@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                      @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                           {{ $message }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Influencer</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%">
                            <div class="col-md-12">
                                <select style="height: 50px;width: 20%" id="campaign_switch">
                                  @php
                                  $list_campaign = DB::table('campaign')->where('id_user',Session::get('id'))->get(['id_campaign','nama']);
                                  if(count($list_campaign)==0){
                                    echo '<option>Tidak ada campaign</option>';
                                  }
                                  else{
                                  if(isset($id_campaign)){
                                    @endphp
                                    @foreach($list_campaign as $row_l)
                                    <option value="{{$row_l->id_campaign}}" @if($row_l->id_campaign==$id_campaign) selected @endif >{{$row_l->nama}}</option>
                                  @endforeach
                                    @php
                                  }
                                  else{
                                    @endphp
                                    @foreach($list_campaign as $row_l)
                                    <option value="{{$row_l->id_campaign}}" >{{$row_l->nama}}</option>
                                  @endforeach
                                  @php
                                  }
                                  }
                                  @endphp
                                </select>
                                <input type="text" id="influencer" name="influencer" placeholder="Nama Influencer" style="height: 50px;padding-left: 2%;width: 70%">
                                {{-- <input type="button" name="search" class="btn" value="?"> --}}
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                         <div class="row" style="margin-top: 2%">
                          <div class="col-md-2">
                            <label>Tag :</label>
                            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal">
                                Pilih Tag
                            </button>

                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @php
                              $allTag = DB::table('master_tag')->get()
                            @endphp
                            @foreach($allTag as $tag)
                              <div class="col">
                                <input class="messageCheckbox" type="checkbox" value="{{$tag->id_master}}" id="{{$tag->deskripsi}}" name="filter_tag[]">
                                <label for="{{$tag->deskripsi}}">{{$tag->deskripsi}}</label>
                              </div>
                            @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                          </div>
                          <div class="col-md-3">
                            <label for="">Minimal Follower</label>
                            <input type="number" id="min_follower" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label for="">Minimal Likes Rata-rata</label>
                            <input type="number" id="min_likes" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <button class="btn btn-primary form-control" id="submitFilter" style="margin-top: 12%">Filter</button>
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
                                          <h2>{{$row->engagement}}</h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->likes}}</h2>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">View Instastories</p>
                                        </div>
                                        <div class="col-md-6">
                                          <p style="font-size: 12px">Komentar rata-rata</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->instastory}}</h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                          <h2>{{$row->comments}}</h2>
                                        </div>
                                      </div>
                                      <div class="row" style="margin-top: 5%">
                                        <div class="col-md-7">
                                          <form action="/dashboard/influencer" method="POST">
                                          {{ csrf_field() }}
                                          @php
                                          if(isset($id_campaign)){
                                            @endphp
                                            <input type="hidden" id="id_campaign" name="id_campaign" value="{{$id_campaign}}">
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
                                            <input type="hidden"  id="id_campaign" name="id_campaign" value="{{$id_campaign}}">
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
              @php
            $porto = DB::table('photo_portofolio')->where('id_user',$row->id)->get('filename');
                                $check = count($porto)
                                @endphp
            @foreach($porto as $row_p)
                                <div class="col-md-3">
                                    <img src="/images/portofolio/{{$row_p->filename}}">
                                </div>
                                @endforeach
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
                <h3>{{$row->post}}</h3>
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
                <h3>{{$row->likes}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->comments}}</h3>
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
                <h3>{{$row->share}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->instastory}}</h3>
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
                <h3>{{$row->reach}}</h3>
              </div>
              <div class="col-md-6 text-right">
                <h3>{{$row->engagement}}</h3>
              </div>
            </div>
            <div class="row" style="margin-top: 4%">
                <div class="col-md-6">
                  <p>Lokasi Follower</p>
                </div>
            </div>
            <div class="row" style="margin-top: 2%">
                <div class="col-md-12">
                  @php
                  $daerah = DB::table('daerah_user')->where('id', $row->id)->get();
                  if(count($daerah)){
                  @endphp
                    @foreach($daerah as $row_d)
                    <div class="row">
                        <div class="col-md-5">
                          <h3>{{$row_d->percent}}%</h3>
                        </div>
                        <div class="col-md-4">
                          <h3>{{$row_d->daerah}}</h3>
                        </div>
                      </div>
                    @endforeach
                  @php
                  }
                  else{
                    @endphp
                    <div class="row">
                    <div class="col-md-5">
                      Belum Menambahkan Data Daerah
                    </div>
                  </div>
                  @php
                  }
                  @endphp
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

  @section('filter-js')
  <script type="text/javascript">
    $(document).on('click','#submitFilter', function(e){
      e.preventDefault();
      var all_tags = []
      var checked_tags = []
      var tags = $("input[name='filter_tag[]']").each(function() {
        all_tags.push(this.value)
        if (this.checked) { checked_tags.push(this.value) }
      });
      var min_follower = $("#min_follower").val()
      var min_likes = $("#min_likes").val()
      var influencer = $("#influencer").val()

      //console.log([checked_tags,min_biaya,deadline])

      $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('influencer') }}",
          type: "GET",
          data: {all_tags, checked_tags, min_follower, min_likes, influencer},
          success: function(d){
            $('div').html(d)
            $("input[name='filter_tag[]']").each(function() {
              if (checked_tags.includes(this.value)) { this.checked = true }
            });
            $("#min_follower").val(min_follower)
            $("#min_likes").val(min_likes)
            $("#influencer").val(influencer)
          }
      }); 
    });
  </script>
  @endsection