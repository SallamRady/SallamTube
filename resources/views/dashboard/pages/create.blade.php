@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Create Page'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Create Page'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Page</h4>
                <p class="card-category">Create Page with in your e-store</p>
            </div>
            <div class="card-body">
                <form action="{{ route('pages.store') }}" method="post">
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
                        {{--Description--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Description</label>
                                <input type="text" value="{{ old('description') }}" name="description" class="form-control">
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Meta Key Word</label>
                                <input type="text" value="{{ old('meta_KeyWord') }}" name="meta_KeyWord" class="form-control">
                                @error('meta_KeyWord')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

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
