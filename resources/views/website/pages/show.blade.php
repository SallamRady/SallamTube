@extends('website.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title" style="margin-top: 130px">{{ $page->name }}</h2>
                <h5 class="description" style="word-break: break-word">{{ $page->description }}</h5>

            </div>
        </div>
    </div>

@endsection
