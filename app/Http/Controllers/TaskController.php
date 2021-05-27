<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\user;
use App\Models\Influencer;
use App\Models\Campaign;
use App\Models\CampaignProcess;
use Auth;
use Session;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function setprofile(){
        return view('dashboard/setprofile');
    }

    public function setprofile_ig(){
        $data['list_tag'] = DB::table('master_tag')->get();
        return view('dashboard/setprofile_ig',$data);
    }

    public function setprofile_act(Request $request){
        $pass = $request->password;
        $user = Auth::user();
        $request->validate([
            'password' => 'required|confirmed|min:8',
            'photo' => 'required|max:2048',
            'no_hp' => 'required|min:12',
        ]);
        $imageName = time()+$user->id.'.'.$request->photo->getClientOriginalExtension();;
        $request->photo->move(public_path('images/profile'), $imageName);
        $user->photo=$imageName;
        $user->password=Hash::make($pass);
        $user->no_hp=$request->no_hp;
        $user->save();
        if($user->role==1){
            return redirect('/dashboard');
        }
        else{
            return redirect('/dashboard/setprofile_ig');   
        }

    }

    public function setprofile_igact(Request $request){
        $pass = $request->password;
        $user = Auth::user();
        $request->validate([
            'username' => 'required',
            'tag' => 'required',
        ]);
        $response = Http::get('http://127.0.0.1:5000/scrap/'.$request->username);
        $resp = $response->json();
        $tag = $request->tag;
        foreach ($tag as $row) {
            DB::table('tag')->insert([
                'id_user' => $user->id,
                'id_master' => $row,
            ]);
        }
        DB::table('influencer')->insert([
            'id' => $user->id,
            'username' => $request->username,
            'nama' => $resp['name'],
            'follower' => $resp['follower'],
            'following' => $resp['following'],
        ]);
        return redirect('/dashboard');

    }

    public function index(){
        $user = Auth::user();
        Session::put('role', $user->role);
        Session::put('id', $user->id);
        $data['list_tag'] = DB::table('master_tag')->get();
        if($user->role==1){ // umkm
            $data['list_campaign'] = Campaign::where('id_user',$user->id)->get();
        }
        else{
            $data['list_campaign'] = Campaign::join('campaign_process','campaign_process.id_campaign','=','campaign.id_campaign')->join('users','campaign.id_user','=','users.id')->where('campaign_process.id_user',$user->id)->get(['campaign.*','users.name','campaign_process.*']);   
        }
        // print_r($data['list_campaign']);die();
        return view('dashboard/index',$data);
    }

    public function index_act(Request $request){
        $user = Auth::user();
        $campaign = new Campaign;
        if($request->tipe==0){
            $request->validate([
                'campaign' => 'required',
                'photo_campaign' => 'required|max:2048',
                'produk' => 'required',
                'tag' => 'required',
                'daerah' => 'required',
                'biaya' => 'required',
                'deadline' => 'required',
                'jenis' => 'required',
                'laporan' => 'required',
                'post' => 'required',
                'deskripsi' => 'required',
                'photo_example' => 'required',
                'syarat' => 'required',
            ]);
            $campaign->deskripsi = $request->deskripsi;
        }
        else{
             $request->validate([
                'campaign' => 'required',
                'photo_campaign' => 'required|max:2048',
                'produk' => 'required',
                'tag' => 'required',
                'biaya' => 'required',
                'deadline' => 'required',
                'jenis' => 'required',
                'laporan' => 'required',
                'post' => 'required',
                'photo_example' => 'required',
                'syarat' => 'required',
            ]);
             $campaign->deskripsi = '';
        }
        $imageName = time().$user->id.'.'.$request->photo_campaign->getClientOriginalExtension();
        $request->photo_campaign->move(public_path('images/campaign'), $imageName);
        $campaign->nama = $request->campaign;
        $campaign->photo_campaign = $imageName;
        $campaign->produk = $request->produk;
        $campaign->tipe = $request->tipe;
        $campaign->biaya = $request->biaya;
        $campaign->status_campaign = 1;
        $campaign->deadline = $request->deadline;
        $campaign->jenis = $request->jenis;
        $campaign->laporan = $request->laporan;
        $campaign->post = $request->post;
        $campaign->syarat = $request->syarat;
        $campaign->id_user = $user->id;
        $campaign->save();
        if($request->tipe==0){
            foreach($request->daerah as $row){
            DB::table('daerah_campaign')->insert([
                'id_campaign' => $campaign->id,
                'daerah' => $row,
            ]);
            }
        }
        foreach($request->tag as $row){
            DB::table('produk_tag')->insert([
                'id_campaign' => $campaign->id,
                'id_master' => $row,
            ]);
        }
        $count = 0;
        foreach($request->photo_example as $row){
            $imageName = time().$campaign->id.'_example'.$count.'.'.$row->getClientOriginalExtension();
            $row->move(public_path('images/example'), $imageName);
            DB::table('photo_example')->insert([
                'id_campaign' => $campaign->id,
                'filename' => $imageName,
            ]);
            $count++;
        }
        return redirect('/dashboard');

    }

    public function list_campaign(Request $request){
        // $user = Auth::user();
        $all_tags = $request->input('all_tags');
        $checked_tags = $request->input('checked_tags');
        $min_biaya = $request->input('min_biaya');
        $deadline = $request->input('deadline');
        $campaign = $request->input('campaign');

        if($checked_tags || $min_biaya || $deadline || $campaign){
            $data['list_campaign'] = Campaign::join('users','campaign.id_user','=','users.id')
                                    ->join('produk_tag','campaign.id_campaign','=','produk_tag.id_campaign')
                                    ->whereIn('id_master', $checked_tags ? $checked_tags : $all_tags)
                                    ->where('biaya', '>=', $min_biaya ? $min_biaya : 0)
                                    ->whereDate('deadline', $deadline ? '=' : '!=', $deadline ? $deadline : 'null')
                                    ->where('nama','like','%'.$campaign.'%')
                                    ->where('tipe',0)->distinct()->get(['campaign.*','users.name']);

        }
        else{
            $data['list_campaign'] = Campaign::join('users','campaign.id_user','=','users.id')->where('tipe',0)->get(['campaign.*','users.name']);
        }

        return view('dashboard/campaign',$data);
    }

    public function register_campaign(Request $request){
        $user = Auth::user();
        $id_campaign = $request->id_campaign;
        $campaign_proc = new CampaignProcess;
        if($user->role==2){
            $campaign_proc->id_campaign = $id_campaign;
            $campaign_proc->id_user = $user->id;
            $campaign_proc->status = 0;
            $campaign_proc->save();
            return redirect('/dashboard/campaign');
        }
        else{
            $campaign_proc->id_campaign = $id_campaign;
            $campaign_proc->id_user = $request->id_user;
            $campaign_proc->status = 0;
            $campaign_proc->save();
            return redirect('/dashboard/influencer');
        }
    }

    public function influencer(){
        $data['list_influencer'] = Influencer::join('users','influencer.id','=','users.id')->get(['influencer.*','photo']);
        // print_r($data['list_influencer']);
        return view('dashboard/influencer',$data);
    }
    
    public function acceptance(Request $request){
        $user = Auth::user();
        if($user->role==1){
            if(isset($request->accept)){
                $campaign_proc = CampaignProcess::find($request->id_process);
                $campaign_proc->status = 1;
                $campaign_proc->save();
            }
            else{
                $campaign_proc = CampaignProcess::find($request->id_process);
                $campaign_proc->status = 0;
                $campaign_proc->save();   
            }
            return redirect('/dashboard/');
        }
    }

    public function campaign_progress(Request $request){
        $response = Http::get('http://127.0.0.1:5000/post/'.$request->link);
        $resp = $response->json();
        $campaign_proc = CampaignProcess::find($request->id_process);
        if($campaign_proc->shortcode==''){
            $request->validate([
                'link' => 'required',
            ]);
        }
        else{
            $request->validate([
                'link' => 'required',
                'bukti' => 'required|max:2048',
                'share' => 'required',
                'jangkauan' => 'required',
            ]);
            $imageName = 'Bukti'.time().$request->id_process.'.'.$request->bukti->getClientOriginalExtension();
            $request->bukti->move(public_path('images/bukti'), $imageName);
            $campaign_proc->bukti = $imageName;
            $campaign_proc->share = $request->share;
            $campaign_proc->jangkauan = $request->jangkauan;
        }
        $campaign_proc->shortcode = $request->link;
        $campaign_proc->url_photo = $resp['url'];
        $campaign_proc->likes = $resp['like'];
        $campaign_proc->comments = $resp['comment'];
        $campaign_proc->save();
        return redirect('/dashboard/');

    }

    public function private_campaign($id_campaign){
        $data['list_influencer'] = Influencer::join('users','influencer.id','=','users.id')->get(['influencer.*','photo']);
        $data['id_campaign'] = $id_campaign;
        // print_r($data['list_influencer']);
        return view('dashboard/influencer',$data);
    }

    public function influencer_act(Request $request){
        $id_campaign = $request->id_campaign;
        $id_user = $request->id_user;
        $campaign_proc = new CampaignProcess;
        $campaign_proc->id_campaign = $id_campaign;
        $campaign_proc->id_user = $id_user;
        $campaign_proc->status = 0;
        $campaign_proc->save();
        return redirect('/dashboard');
    }

    public function profile(){
        $user = Auth::user();
        if(Session::get('role')==2){
            $data['all'] = Influencer::join('users','influencer.id','=','users.id')->first();
        }
        else{
            $data['all'] = $user;   
        }
        $data['daerah'] = DB::table('daerah_user')->where('id',$user->id)->get('daerah');
        return view('dashboard/profile',$data);
    }
    
}
