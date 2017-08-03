<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Video;

class VideoRepository extends Repository{

    function model()
    {
        // TODO: Implement model() method.
        return Video::class;
    }

    public function findAll()
    {
        return $this->model->paginate(12);
    }

    public function findNewVideoIn12(){
        return $this->model->where('is_new','!=','F')->paginate(12);
    }

    public function getVideoDate(){
        $date =[];
        $video_data = Video::all();
        foreach ($video_data as $video){
            $video_date = $video->issue_date;
            if (!in_array($video_date, $date)){
                array_push($date,$video_date);
            }
        }

        return $date;
    }

}