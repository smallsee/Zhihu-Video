@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="jumbotron" style="margin-top: -23px">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                        <div class="col-sm-5 col-md-4">

                            <div class="thumbnail" style="background-color: #eeeeee;border: 0">
                                <a href="#"><img class="img-thumbnail" src="{{$data->thumb}}" alt="..."></a>
                            </div>
                        </div>

                    <div class="col-sm-4 col-md-6">
                        <h4>{{$data->title}}</h4>
                        <div class="flex-row-between margin-bottom-10">
                            <em>
                                地区：
                                <a class="text-black" href="#">{{$data->address}}</a>
                            </em>
                            <em>
                                类型：
                                @foreach($tags as $tag)
                                    <a href="/video/tag/{{$tag}}">{{$tag}}</a>
                                @endforeach
                            </em>
                        </div>

                        <div class="flex-row-between margin-bottom-10">
                            <em>
                                语言：
                                <a href="#">{{$data->language}}</a>
                            </em>
                            <em>
                                版本：
                                <a href="#">{{$data->version}}</a>
                            </em>
                        </div>

                        <div class="flex-row-between margin-bottom-10">
                            @if( $data->is_new != "F")
                                <em>
                                    <span>{{$data->is_new}}</span>
                                </em>
                            @endif
                            <em>
                                集数：
                                <a href="#">{{$data->episodes}}</a>
                            </em>
                        </div>

                        <div class="flex-row-between margin-bottom-10">
                            <em>
                                声优：
                                @foreach($akiras as $akira)
                                <a href="/video/akira/{{$akira}}">{{$akira}}</a>
                                @endforeach
                            </em>
                        </div>

                        <div class="margin-bottom-10 auth-word-break">
                            <span style="margin-right: 5px">
                                简介：
                            </span>
                            <span>{{$data->abstract}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading flex-row">
                        剧集详情
                    </div>

                    <div class="panel-body">
                        @foreach($data->files as $file)
                        <div class="col-sm-3 col-md-2">
                            <div class="thumbnail" style="background-color: #eeeeee;border: 0">
                                <div class="caption laravideo-tab-caption">
                                    <a href="/video/{{$data->id}}/play?video_id={{$loop->index}}">
                                        <p style="font-size: 12px">第{{$loop->index + 1}}集{{str_limit($file->file_name,15,'...') }}</p></a>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
