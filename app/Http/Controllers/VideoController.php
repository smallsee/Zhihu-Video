<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Repositories\Eloquent\TagRepository;
use App\Repositories\Eloquent\VideoRepository;
use App\Tag;
use App\TagVideo;
use App\Video;
use App\VideoFile;
use Illuminate\Http\Request;
use Mockery\Exception;

class VideoController extends Controller
{
    private $video;
    private $tag;

    public function __construct(VideoRepository $video, TagRepository $tag)
    {
        $this->middleware('auth')->except(['index','show','play','putJsonToMysql','tags']);
        $this->video = $video;
        $this->tag = $tag;
    }


    public function putJsonToMysql(){
        $json_string = file_get_contents('articleexport.json');

// 把JSON字符串转成PHP数组
        $data = json_decode($json_string, true);
        foreach ($data as $item){
            foreach ($item['tag'] as $tag){
                $tag = Tag::firstOrCreate(['name' => $tag]);
            }
            $count = 0;

            $video_data = [
                'title' => $item['title'],
                'thumb' => '/'.$item['local_thumb'],
                'abstract' => $item['abstract'],
                'episodes' => $item['episodes'],
                'language' => $item['language'],
                'version' => $item['version'],
                'address' => $item['address'],
                'is_new' => $item['is_new'],
                'status' => 1,
                'issue_date' => $item['created_at'],
                'tag' => implode('/',$item['tag']),
                'akira' => implode('/',$item['akira']),
            ];



            if (Video::where('title',$item['title'])->first()){
                $video = Video::where('title',$item['title'])->first();
            }else{
                $video = Video::create($video_data);
            }


            foreach ($item['tag'] as $tag){
                $tag_id = Tag::where('name', $tag)->first()->id;
                TagVideo::create([
                    'tag_id' =>  $tag_id,
                    'video_id' =>  $video->id
                ]);
            }

            foreach ($item['file_url'] as $file_url){

                $file_name = isset($item['file_name'][$count]) ? $item['file_name'][$count] : '';


                VideoFile::firstOrCreate([
                    'file_name' =>  $file_name,
                    'file_url' =>   $file_url,
                    'file_thumb' =>  $item['file_thumb'][$count],
                    'video_id' => $video->id
                ]);
                $count += 1;
            }


        }

    }

    public function index(){
        return $this->video->findAllArray();
        $data  = $this->video->findAll();
        $new_data = $this->video->findNewVideoIn12();
        return view('video.index',compact('data','new_data'));
    }

    public function show($id){
        $data = $this->video->findById($id);
        $data->load('files');

        //动漫类型和声优才分
        $tags =  explode('/',$data->tag);
        $akiras=  explode('/',$data->akira);
        return view('video.show',compact('data','tags','akiras'));
    }

    public function play($id){
        //获取第几个播放
        $video_id = request('video_id',0);

        //获取单个数据
        $data = $this->video->findById($id);
        $data->load('files');

        //动漫类型拆分
        $tags =  explode('/',$data->tag);

        return view('video.play',compact('data','video_id','tags'));
    }

    public function tags($name){


        //判断年份
        $issue_date = request('year','');
        //获取所有年份
        $date = $this->video->getVideoDate();

        //获取对应类型的视频
        $tags = $this->tag->findAll();
        $tagThis = $this->tag->findOne('name',$name);
        $data = $tagThis->videos()->where([
            ['issue_date','like','%'.$issue_date.'%']
        ])->paginate(12);
        //获取新番
        $video_type = request('video_type','');
        if ($video_type === "新番"){
            $data = $tagThis->videos()->where([
                ['issue_date','like','%'.$issue_date.'%'],
                ['is_new','!=','F']
            ])->paginate(12);
        }
        return view('video.tag',compact('data','tags','date','name','issue_date','video_type'));
    }

    public function create(){


    }

    public function store(VideoRequest $request){
        $this->video->create($request->all());
        dd('yes');
    }

    public function edit($id){
        $data = $this->video->findById($id);
        dd($data);
    }

    public function update($id, VideoRequest $request){

        $data = $this->video->update($id, $request->all());
        dd($data);

    }

    public function destroy($id)
    {
        $data = $this->video->deleteById($id);
        dd($data);
    }

}
