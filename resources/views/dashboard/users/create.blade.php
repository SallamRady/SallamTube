@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Create User'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Create User'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create User</h4>
                <p class="card-category">Create User with all rights as normal user</p>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
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
                        {{--email--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--password--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--password_confirmation--}}
                        <div class="col-md-8">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">password confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">You Can add Your best sentence</label>
                                    <textarea class="form-control" value="{{ old('best_sentence') }}" name="best_sentence" rows="5"></textarea>
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
