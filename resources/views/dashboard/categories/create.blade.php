@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Create Category'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Create Category'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Category</h4>
                <p class="card-category">Create Category with in your e-store</p>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="post">
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
