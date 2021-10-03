@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard'])
    @endcomponent
    {{--///////////////////////////////////--}}
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-youtube"></i>
                    </div>
                    <p class="card-category">Videos</p>
                    <h3 class="card-title">
                        {{ \App\Models\Video::count() }}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('videos.index') }}" class="warning-link">see all videos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Categories</p>
                    <h3 class="card-title">{{ \App\Models\Category::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('categories.index') }}" class="warning-link">see all categories</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">widgets</i>
                    </div>
                    <p class="card-category">Skills</p>
                    <h3 class="card-title">{{ \App\Models\Skill::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('skills.index') }}" class="warning-link">see all skills</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <p class="card-category">Tags</p>
                    <h3 class="card-title">{{ \App\Models\Tag::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('tags.index') }}" class="warning-link">see all tags</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--///////////////////////////////////--}}

    {{--///////////////////////////////////--}}
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon" style="background: #1d63df">
                        <i class="material-icons">messages</i>
                    </div>
                    <p class="card-category">Messages</p>
                    <h3 class="card-title">
                        {{ \App\Models\Message::count() }}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('messages.index') }}" class="warning-link">see all messages</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon" style="background: #5800d9">
                        <i class="material-icons">people</i>
                    </div>
                    <p class="card-category">Users</p>
                    <h3 class="card-title">{{ \App\Models\User::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('users.index') }}" class="warning-link">see all users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon" style="background: aqua">
                        <i class="material-icons">pages</i>
                    </div>
                    <p class="card-category">Pages</p>
                    <h3 class="card-title">{{ \App\Models\Page::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-right" style="margin: 6px" aria-hidden="true"></i>
                        <a href="{{ route('pages.index') }}" class="warning-link">see all pages</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <p class="card-category">Comments</p>
                    <h3 class="card-title">{{ \App\Models\Comment::count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="fa fa-arrow-circle-down" style="margin: 6px" aria-hidden="true"></i>
                        <p class="text-warning">check table below</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--///////////////////////////////////--}}


    {{-- Comments Table --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Latest Comments</h4>
                <p class="card-category">The Latest comments add On Videos</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover" >
                    <thead class="text-warning">
                    <tr>
                        <th>User Name</th>
                        <th>Video Name</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $comments as $comment )
                        <tr>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->video->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <div class="btn btn-danger">
                                    <a href="{{ route('deleteComment_from_CP',$comment->id) }}">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>{{ $comments->links() }}</div>
            </div>
        </div>
    </div>
    {{-- Comments Table --}}
@endsection
