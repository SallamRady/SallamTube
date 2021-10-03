@extends('website.layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 90px">
        <div class="row">
            <div class="col-md-8">
                {{-- video name comments....... --}}
                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{ youtube_video_id($video->youtube_link) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br/>
                <h2><b>video name :{{ $video->name }}</b></h2>
                <div class="video_info">
                    <p class="h5 lead">description : {{ $video->description }}</p>
                    <h5> added by : {{ $video->user->name }}</h5>
                    <small>created at :{{ $video->created_at }}</small>
                </div>
                <span class="more_info">See More</span>
                <hr/>
                <h6 class="see_comments"><strong>See Comments</strong></h6>
                <hr/>
                <div class="comments">
                <form action="{{ route('add_comment') }}" method="post">
                    @csrf
                    <input type="hidden" name="video_id" value="{{ $video->id }}" />
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Add Comment</label>
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <br/>
                        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                    </div>
                </form>
                <br/>
                @foreach( $comments as $comment)
                    <hr/>
                    <h6><b>comment : {{ $comment->comment }}</b></h6>
                    <small>created at : <b>{{ $comment->created_at }}</b></small><br/>
                    <strong>User : <b>{{ $comment->user->name }}</b></strong><br/>
                    @if(auth()->user()->id == $comment->user_id)
                        <div class="btn btn-danger">
                            <a href="{{ route('delete_comment',$comment->id) }}" style="color: white">Delete</a>
                        </div>
                        <div class="btn btn-primary">
                            <span id="user_edit_comment"  style="color: white">Edit</span>
                        </div>
                        <div id="edit_comment_div">
                            <h6>Edit your comment</h6>
                            <form action="{{ route('edit_comment') }}" method="post">
                                @csrf
                                <input type="hidden" name="video_id" value="{{ $video->id }}" />
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $comment->comment }}</textarea>
                                    <br/>
                                    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                                </div>
                            </form>
                        </div>
                    @endif

                @endforeach

                </div>
            </div>
            <div class="col-md-4">
                <div class="container">
                    <div class="row">
                        @foreach($cat_videos as $cat_video)
                            @if($cat_video->id != $video->id)
                            <div class="col-md-12">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="{{asset('Uploads/'.$cat_video->poster)}}" style="height: 140px" alt="Card image cap">
                                    <div class="card-body" style="height: 190px">
                                        <h6>{{ $cat_video->name }}</h6>
                                        <p class="card-text" >{{ $cat_video->description }}</p>
                                        <small>{{ $cat_video->created_at }}</small><br/>
                                        <a href="{{ route('video_show',$cat_video->id) }}" style="color: aqua">
                                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                            see video
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                        @foreach($videos as $a_video)
                                <div class="col-md-12">
                                    <div class="card" style="width: 20rem;">
                                        <img class="card-img-top" src="{{asset('Uploads/'.$a_video->poster)}}" style="height: 140px" alt="Card image cap">
                                        <div class="card-body" style="height: 190px">
                                            <h6>{{ $a_video->name }}</h6>
                                            <p class="card-text" >{{ $a_video->description }}</p>
                                            <small>{{ $a_video->created_at }}</small><br/>
                                            <a href="{{ route('video_show',$a_video->id) }}" style="color: aqua">
                                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                                see video
                                            </a>
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
