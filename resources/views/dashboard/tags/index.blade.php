@extends('dashboard.layouts.body')

@php
    $table_name = "Tags Table";
    $table_des = "You can add - edit - delete Tag";
@endphp

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Tags Management'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Tags Management'])
    @endcomponent
    <div class="col-md-12">
        @if( session()->has('success'))
            <div class="alert alert-success Massage">{{ session('success') }}</div>
        @endif
        @if( session()->has('error'))
            <div class="alert alert-danger Massage">{{ session('error') }}</div>
        @endif
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $table_name }}</h4>
                        <p class="card-category">{{ $table_des }}</p>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('tags.create') }}" class="btn btn-white btn-round">Add Tag<div class="ripple-container"></div></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th class="text-right">
                                Control
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td class="td-actions text-right" style="float: right">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <form action="{{ route('tags.edit',$tag->id) }}" method="get">
                                                @csrf
                                                <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-xs-6">
                                            <form action="{{ route('tags.destroy',$tag->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $tags->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
