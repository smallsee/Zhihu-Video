@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span style="float: left;color: rgb(158, 155, 155); ">年份：</span>

                        @if('' == $issue_date)
                            <a style="float: left;margin: 0 10px 5px 0;" href="/video/tag/{{$name}}?year=">全部</a>
                        @else
                            <a style="float: left;margin: 0 10px 5px 0;color: #2F3133" href="/video/tag/{{$name}}?year=">全部</a>
                        @endif

                        @foreach($date as $date_year)
                            @if($date_year == $issue_date)
                                <a style="float: left;margin: 0 10px 5px 0;" href="/video/tag/{{$name}}?year={{$date_year}}&video_type={{$video_type}}">{{$date_year}}</a>
                            @else
                                <a style="float: left;margin: 0 10px 5px 0;color: #2F3133" href="/video/tag/{{$name}}?year={{$date_year}}&video_type={{$video_type}}">{{$date_year}}</a>
                            @endif
                        @endforeach

                    </div>

                    <div class="panel-heading clearfix">
                        <span style="float: left;color: rgb(158, 155, 155); ">风格：</span>

                        @if('' == $video_type)
                            <a style="float: left;margin: 0 10px 5px 0;" href="/video/tag/{{$name}}?year={{$issue_date}}&video_type=">全部</a>
                        @else
                            <a style="float: left;margin: 0 10px 5px 0;color: #2F3133" href="/video/tag/{{$name}}?year={{$issue_date}}&video_type=">全部</a>
                        @endif

                        @if('新番' == $video_type)
                            <a style="float: left;margin: 0 10px 5px 0;" href="/video/tag/{{$name}}?year={{$issue_date}}&video_type=新番">新番</a>
                        @else
                            <a style="float: left;margin: 0 10px 5px 0;color: #2F3133" href="/video/tag/{{$name}}?year={{$issue_date}}&video_type=新番">新番</a>

                        @endif

                    </div>


                    <div class="panel-heading clearfix">

                            <span style="float: left;color: rgb(158, 155, 155); ">类型：</span>
                            @foreach($tags as $tag)

                                        @if($tag->name == $name)
                                    <a style="float: left;margin: 0 10px 5px 0;" href="/video/tag/{{$tag->name}}?year={{$issue_date}}">{{$tag->name}}</a>
                                        @else
                                            <a style="float: left;margin: 0 10px 5px 0;color: #2F3133  " href="/video/tag/{{$tag->name}}?year={{$issue_date}}&video_type={{$video_type}}">{{$tag->name}}</a>
                                        @endif

                            @endforeach

                    </div>


                    <div class="panel-body">
                        <div class="row">
                            @foreach($data as $item)
                        <div class="col-sm-5 col-md-3">
                            <div class="thumbnail">
                                <a href="{{route('video.show',$item->id)}}"><img src="{{$item->thumb}}" alt="..."></a>
                                <div class="caption laravideo-tab-caption">
                                    <a href="{{route('video.show',$item->id)}}"><p style="font-size: 12px">{{str_limit($item->title,25,'...') }}</p></a>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </div>

                        {{ $data->links() }}
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
