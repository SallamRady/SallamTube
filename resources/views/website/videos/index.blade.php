@extends('website.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title" style="margin-top: 80px">
                    <h2>Latest Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($videos as $video)
                <div class="col-lg-4 col-md-6">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="{{asset('Uploads/'.$video->poster)}}" style="height: 140px" alt="Card image cap">
                        <div class="card-body" style="height: 190px">
                            <h6>{{ $video->name }}</h6>
                            <p class="card-text" >{{ $video->description }}</p>
                            <small>{{ $video->created_at }}</small><br/>
                            <a href="{{ route('video_show',$video->id) }}" style="color: aqua">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                see video
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $videos->links() }}
        </div>
    </div>

@endsection
