@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Edit User'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Edit User'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit User Profile</h4>
                <p class="card-category">Complete your information...</p>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update',$user->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="text-center">
                                <img src="{{ asset('/images/profile_image.jpeg') }}" style="border-radius: 48%" alt="User avater">
                            </div>
                        </div>
                        {{--name--}}
                        <div class="col-md-8 col-xs-12">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--email--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--password--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password ( Do not type ant thing if you do not want to change it )</label>
                                <input type="password" name="password"  class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--password_confirmation--}}
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">password confirmation ( Do not type ant thing if you do not want to change it )</label>
                                <input type="password"  name="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        </div>
                    </div>

                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Me</label>
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">You Can add Your best sentence</label>
                                    <textarea class="form-control"  name="best_sentence" rows="5">{{ $user->best_sentence }}</textarea>
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
