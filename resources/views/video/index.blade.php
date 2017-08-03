@extends('layouts.app')
@section('css')
@endsection
@section('content')

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: -21px;margin-bottom: 20px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active" style="max-height: 500px;overflow: hidden">
                <img width="100%"  src="/images/1.jpg" alt="...">
            </div>
            <div class="item " style="max-height: 500px;overflow: hidden">
                <img width="100%"  src="/images/2.jpg" alt="...">
            </div>
            <div class="item " style="max-height: 500px;overflow: hidden">
                <img width="100%"  src="/images/3.jpg" alt="...">
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading flex-row-between">
                        <a href="#">新番</a>
                        <a href="/video/tag/番剧?video_type=新番">更多</a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($new_data as $item)
                        <div class="col-sm-4 col-md-2">
                            <div class="thumbnail">
                                <a href="{{route('video.show',$item->id)}}"><img src="{{$item->thumb}}" alt="..."></a>
                                <div class="caption laravideo-tab-caption">
                                    <a href="{{route('video.show',$item->id)}}"><p style="font-size: 12px">{{str_limit($item->title,10,'...') }}</p></a>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading flex-row-between">
                        <a href="#">番剧</a>
                        <a href="/video/tag/番剧">更多</a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($data as $item)
                                <div class="col-sm-4 col-md-2">
                                    <div class="thumbnail">
                                        <a href="{{route('video.show',$item->id)}}"><img src="{{$item->thumb}}" alt="..."></a>
                                        <div class="caption laravideo-tab-caption">
                                            <a href="{{route('video.show',$item->id)}}"><p style="font-size: 12px">{{str_limit($item->title,10,'...') }}</p></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
      $('.carousel').carousel()
    </script>
@endsection
