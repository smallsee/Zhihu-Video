@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <ol class="breadcrumb" style="margin-bottom: 0">
                            <li><a href="/video">视频</a></li>

                            <li>
                                @foreach($tags as $tag)
                                <a href="/video/tag/{{$tag}}">{{$tag}}</a>
                                @endforeach
                            </li>

                            <li><a href="/video/{{$data->id}}">{{$data->title}}</a></li>
                            <li class="active">{{$data->files[$video_id]->file_name}}</li>
                        </ol>
                    </div>

                    <div class="panel-body">
                        <iframe src="http://jiexi.071811.cc/jx.php?url={{$data->files[$video_id]->file_url}}" width="100%" scrolling="no" height="700px" ></iframe>
                    </div>

                    @if($data->files->count() > 1)
                    <div class="panel-footer">
                        @foreach($data->files as $file)

                            @if($loop->index == $video_id)
                                <button style="background-color: #00a0e9"  class="btn btn-default video-button" type="button">
                                    <a style="color: white" href="/video/{{$data->id}}/play?video_id={{$loop->index}}">{{$loop->index + 1}}、{{$file->file_name}}</a>
                                </button>
                                @else
                                <button  class="btn btn-default video-button" type="button">
                                    <a href="/video/{{$data->id}}/play?video_id={{$loop->index}}">{{$loop->index + 1}}、{{$file->file_name}}</a>
                                </button>
                            @endif

                        @endforeach

                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
