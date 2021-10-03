@extends('dashboard.layouts.body')

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Edit Skill'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Dashboard/Edit Skill'])
    @endcomponent
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Skill info</h4>
                <p class="card-category">Complete Skill information...</p>
            </div>
            <div class="card-body">
                <form action="{{ route('skills.update',$skill->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="text-center">
                                <img src="{{ asset('/images/skills.png') }}" class="rounded embed-responsive" alt="User avater">
                            </div>
                        </div>
                        <br/>
                        {{--name--}}
                        <div class="col-md-8 col-xs-12">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" value="{{ $skill->name }}" name="name" class="form-control">
                                    @error('name')
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
