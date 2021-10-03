@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Edit Comment'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Edit Comment'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Comment info</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('comment_update',$comment->id) }}" method="post">
                    @csrf
                    <div class="row">
                        {{--name--}}
                        <div class="col-md-8 col-xs-12">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Comment</label>
                                    <input type="text" value="{{ $comment->comment }}" name="comment" class="form-control">
                                    @error('comment')
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
    </div>
@endsection
