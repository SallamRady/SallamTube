@extends('website.layouts.app')

@section('content')
        <div class="section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Let's talk product</h2>
                        <h5 class="description">This is Website has done by Eng: Sallam Rady. I wish you can Benefit from it the maximum possible benefit through the content on the site, and we hope for your support by subscribing, registering, and sending your reaction in order to ensure that what is more useful to you is provided. Thank you.</h5>
                        <br>
                        <a href="{{ route('home') }}" class="btn btn-danger btn-round">See Courses</a>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-satisfied"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Send your feed Back</h4>
                                <p class="description">sending your reaction in order to ensure that what is more useful to you is provided.you can see this part in  Keep in touch  below</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-bulb-63"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">New Ideas</h4>
                                <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
                                <a href="javascript:;" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-chart-bar-32"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Choose Way</h4>
                                <p>Choose your way and work hard to improve your skills.</p>
                                <a href="{{ route('home') }}" class="btn btn-link btn-danger">See more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="nc-icon nc-badge"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Create an account</h4>
                                <p>To receive all that is new and get more benefits</p>
                                <a href="{{ route('user_register') }}" class="btn btn-link btn-danger">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-dark text-center">
            <div class="container">
                <h2 class="title">Let's talk about us</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar">
                                    <img src="./frontend/img/faces/Sallam2.jpg" style="height: 100px" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Sallam Rady</h4>
                                        <h6 class="card-category">Product Manager</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                    Teamwork is so important that it is virtually impossible for you to reach the heights of your capabilities or make the money that you want without becoming very good at it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar">
                                    <img src="./frontend/img/faces/sallamrady.jpg" style="height: 100px" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Sallam Rady</h4>
                                        <h6 class="card-category">Designer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                    A group becomes a team when each member is sure enough of himself and his contribution to praise the skill of the others. No one can whistle a symphony. It takes an orchestra to play it.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile card-plain">
                            <div class="card-avatar">
                                <a href="#avatar">
                                    <img src="../frontend/img/faces/Sallam.jpg" style="height: 100px" alt="...">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#paper-kit">
                                    <div class="author">
                                        <h4 class="card-title">Robert Orben</h4>
                                        <h6 class="card-category">Developer</h6>
                                    </div>
                                </a>
                                <p class="card-description text-center">
                                    The strength of the team is each individual member. The strength of each member is the team. If you can laugh together, you can work together, silence isn’t golden, it’s deadly.
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-google-plus"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon btn-neutral"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section landing-section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12" style="left: 70px;">
                        @if( session()->has('success'))
                            <div class="alert alert-success Massage">{{ session('success') }}</div>
                        @endif
                        @if( session()->has('error'))
                            <div class="alert alert-danger Massage">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="text-center">Keep in touch?</h2>
                        <form action="{{ route('add_message') }}" method="post" class="contact-form" id="formH">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="nc-icon nc-single-02"></i>
                                          </span>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="nc-icon nc-email-85"></i>
                                          </span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <label>Message</label>
                            <textarea class="form-control" name="message" rows="4" placeholder="Tell us your thoughts and feelings..." required></textarea>
                            @error('message')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
