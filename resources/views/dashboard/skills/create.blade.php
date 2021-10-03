@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Create New Skill'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Create New Skill'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create New Skill</h4>
                <p class="card-category">Create New Skill in your e-store</p>
            </div>
            <div class="card-body">
                <form action="{{ route('skills.store') }}" method="post">
                    @csrf
                    <div class="row">
                        {{--name--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
