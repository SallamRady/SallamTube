@extends('dashboard.layouts.body')

@php
    $table_name = "Messages Table";
    $table_des = "You can repeat for message";
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
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $table_name }}</h4>
                        <p class="card-category">{{ $table_des }}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Repeated
                            </th>
                            <th class="text-right">
                                Control
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->repeat }}</td>
                                <td class="td-actions text-right">
                                    <div class="btn btn-primary">
                                        @if($message->repeated == 0)
                                            <a href="{{ route('repeat_messages',$message->id) }}">repeat</a>
                                        @else
                                            <a href="{{ route('repeat_messages',$message->id) }}" disabled>repeat</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $messages->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
