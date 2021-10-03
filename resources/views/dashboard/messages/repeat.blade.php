@extends('dashboard.layouts.body')

@php
    $table_name = "Repeat Message";
@endphp

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Message Management'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Messages Management'])
    @endcomponent
    <div class="col-md-12">
        @if( session()->has('success'))
            <div class="alert alert-success Massage">{{ session('success') }}</div>
        @endif
        @if( session()->has('error'))
            <div class="alert alert-danger Massage">{{ session('error') }}</div>
        @endif
        <div class="card">
            <div class="card-header card-header-info">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $table_name }}</h4>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h4>From : {{ $message->email }}</h4>
                <h4>User Name : {{ $message->name }}</h4>
                <h4>at : {{ $message->created_at }}</h4>
                <h4>Message say</h4>
                <p class="lead">{{ $message->message }}</p>
                <hr/>
                <hr/>
                <form action="{{ route('send_repeat') }}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ $message->email }}" />
                    <input type="hidden" name="message_id" value="{{ $message->id }}" />
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Repeat.....</label>
                            <textarea class="form-control"  name="repeat" rows="5"></textarea>
                            @error('repeat')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 right">
                        <button type="submit" class="btn btn-success text-right">Send Repeat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
