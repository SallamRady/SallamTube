@extends('website.layouts.app')

@section('content')
    <div class="page-header page-header-xs" data-parallax="true" style="background-image: url(&quot;../frontend/img/fabio-mangione.jpg&quot;); transform: translate3d(0px, 18px, 0px);">
        <div class="filter"></div>
    </div>
    <div class="section profile-content">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="../frontend/img/default-avatar.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">Name : {{ auth()->user()->name }}</h4>
                    <h6 class="description">Here from <small>{{ auth()->user()->created_at }}</small></h6>
                </div>

                @if( session()->has('success'))
                    <div  class="btn btn-success Message"><b>Your Request Is Done Successfully</b></div>
                @endif
                @if( session()->has('error'))
                <div  class="btn btn-danger Message"><b>There is an error</b></div>
                @endif

                <btn class="btn btn-outline-default btn-round user_update_btn" ><i class="fa fa-cog"></i> Update your Profile </btn>
            </div>
            <br/>
            <div class="editprofile  user_update">
                <h3>Edit Your Profile</h3>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('update_user_profile') }}" method="post" style="margin: 10px">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" name="name" value="{{ auth('web')->user()->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                @error('name')
                                  <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" value="{{ auth('web')->user()->email }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                @error('email')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="don't typing any thing if you don't went change it.">
                                @error('password')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Comfirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="don't typing any thing if you don't went change it.">
                                @error('password_confirmation')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('/images/profile_image.jpeg') }}" class="responsive intended_image" />
                    </div>
                </div>


            </div>
            </div>
        </div>

@endsection
