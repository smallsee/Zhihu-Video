@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        搜索
                    </div>

                    <div class="panel-body">
                        @foreach($data as $item)
                            <div class="media">
                                <div class="media-left">
                                    <a href="">
                                        <img width="48" src="{{$item->thumb}}" alt="{{$item->thumb}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/{{$type}}/{{$item->id}}">
                                            {{$item->title}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
