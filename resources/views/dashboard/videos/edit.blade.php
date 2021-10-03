@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Edit Video'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Edit Video'])
    @endcomponent
    @if( session()->has('success'))
        <div class="alert alert-success Massage">{{ session('success') }}</div>
    @endif
    @if( session()->has('error'))
        <div class="alert alert-danger Massage">{{ session('error') }}</div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Video</h4>
                <p class="card-category">Edit Video with in your e-store</p>
            </div>
            <div class="card-body">
                <form action="{{ route('videos.update',$video->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-md-12">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ youtube_video_id($video->youtube_link) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        {{--name--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" value="{{ $video->name }}" name="name" class="form-control">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--description--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Description</label>
                                <input type="text" value="{{ $video->description }}" name="description" class="form-control">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--youtube_link--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Link</label>
                                <input type="url" value="{{ $video->youtube_link }}" name="youtube_link" class="form-control">
                                @error('youtube_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--Video Poster--}}
                        <div class="col-md-8">
                            <div>
                                <label>Video Poster</label>
                                <input type="file" value="{{ $video->poster }}" name="poster" class="form-control">
                                @error('poster')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- status --}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Status</label>
                                <select name="status" class="form-control" >
                                    <option value="{{ $video->status }}">
                                        @if($video->status == 1)
                                            Published
                                        @else
                                            Not Published
                                        @endif
                                    </option>
                                    <option value=1 >Published</option>
                                    <option value=0 >Not Published</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- Categoty --}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="{{ $video->category_id }}">{{ $video->category->name }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- meta_KeyWord --}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Meta Key Word</label>
                                <input type="text" value="{{ $video->meta_KeyWord }}" name="meta_KeyWord" class="form-control">
                                @error('meta_KeyWord')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- Mutipule Skills--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group" >
                                <label for="exampleFormControlSelect2">Skills</label>
                                <select multiple name="skills[]" class="form-control" id="exampleFormControlSelect2" style="height: 100px;">
                                    @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" {{in_array($skill->id,$skills_ids)?'selected':""}}>{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Mutipule tags--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group" >
                                <label for="exampleFormControlSelect2">Tags</label>
                                <select multiple name="skills[]" class="form-control" id="exampleFormControlSelect2" style="height: 100px;">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{in_array($tag->id,$tags_ids)?'selected':""}}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    {{-- Meta Description --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Description </label>
                                <div class="form-group bmd-form-group">
                                    <textarea class="form-control"  name="meta_des" rows="5">{{ $video->meta_des }}</textarea>
                                    @error('meta_des')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Video Comments</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <table class="table" style="word-break: break-word">
                                <tbody>

                                @foreach($comments as $comment)
                                            <td> {{ $comment->comment }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('UpdateComment',$comment->id) }}" >
                                                    <i class="material-icons">edit</i>
                                                </a>

                                                <a href="{{route('deleteComment',$comment->id)}}">
                                                    <i class="material-icons">close</i>
                                                </a>

                                            </td>
                                    <tr>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Add Comment</h4>
                        <p class="card-category">Add a public comment on this video</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_Comment') }}" method="post">
                            @csrf
                            <input type="hidden" name="video_id" value="{{ $video->id }}" />
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Comment</label>
                                    <textarea class="form-control"  name="comment" rows="5"></textarea>
                                    @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 right">
                                <button type="submit" class="btn btn-success text-right">add comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
