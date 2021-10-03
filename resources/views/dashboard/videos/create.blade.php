@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Create Video'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Create Video'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Video</h4>
                <p class="card-category">Create Video with in your e-store</p>
            </div>
            <div class="card-body">
                <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{--name--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--description--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Description</label>
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--youtube_link--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Link</label>
                                <input type="url" value="{{ old('youtube_link') }}" name="youtube_link" class="form-control">
                                @error('youtube_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--Video Poster--}}
                        <div class="col-md-8">
                            <div>
                                <label>Video Poster</label>
                                <input type="file" value="{{ old('poster') }}" name="poster" class="form-control">
                                @error('poster')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <br/>
                        {{-- status --}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Status</label>
                                <select name="status" class="form-control">
                                    <option value=1 >Published</option>
                                    <option value=0 >Not Published</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Categoty --}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Video Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- meta_KeyWord --}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Meta Key Word</label>
                                <input type="text" value="{{ old('meta_KeyWord') }}" name="meta_KeyWord" class="form-control">
                                @error('meta_KeyWord')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Mutipule Skills--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group" >
                                <label for="exampleFormControlSelect2">Skills</label>
                                <select multiple name="skills[]" class="form-control" id="exampleFormControlSelect2" style="height: 100px;">
                                    @foreach($skills as $skill)
                                        <option value={{ $skill->id }}>{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- Mutipule tags--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group" >
                                <label for="exampleFormControlSelect2">Tags</label>
                                <select multiple name="tags[]" class="form-control" id="exampleFormControlSelect2" style="height: 100px;">
                                    @foreach($tags as $tag)
                                        <option value={{ $tag->id }}>{{ $tag->name }}</option>
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
                                    <textarea class="form-control"  name="meta_des" rows="5">{{ old('meta_des') }}</textarea>
                                    @error('meta_des')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
