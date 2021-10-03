@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Edit Page'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Edit Page'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Page info</h4>
                <p class="card-category">Complete Page information...</p>
            </div>
            <div class="card-body">
                <form action="{{ route('pages.update',$page->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="text-center">
                                <img src="{{ asset('/images/homecomp.jpg') }}" class="rounded embed-responsive" alt="User avater">
                            </div>
                        </div>
                        <br/>
                        {{--name--}}
                        <div class="col-md-8 col-xs-12">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" value="{{ $page->name }}" name="name" class="form-control">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Description</label>
                                    <input type="text" value="{{ $page->description }}" name="description" class="form-control">
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Meta Key Word</label>
                                    <input type="text" value="{{ $page->meta_KeyWord }}" name="meta_KeyWord" class="form-control">
                                    @error('meta_KeyWord')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Meta Description</label>
                                        <textarea class="form-control"  name="meta_des" rows="5">{{ $page->meta_des }}</textarea>
                                    </div>
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
