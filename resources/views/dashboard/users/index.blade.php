@extends('dashboard.layouts.body')

@php
  $table_name = "Users Table";
  $table_des = "You can add - edit - delete user";
@endphp

@section('content')
    @component('dashboard.layouts.head',['pagetitle'=>'Dashboard-Users Management'])
    @endcomponent

    @component('dashboard.layouts.navbar',['nav_title'=>'Users Management'])
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
                        <a href="{{ route('users.create') }}" class="btn btn-white btn-round">Add User<div class="ripple-container"></div></a>
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
                            <th>
                                Email
                            </th>
                            <th class="text-right">
                                Control
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                              <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td class="td-actions text-right">
                                      <div class="row">
                                          <div class="col-xs-6 text-right">
                                              <form action="{{ route('users.edit',$user->id) }}" method="get">
                                                  @csrf
                                                  <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                                      <i class="material-icons">edit</i>
                                                  </button>
                                              </form>
                                          </div>
                                          <div class="col-xs-6 text-right">
                                              <form action="{{ route('users.destroy',$user->id) }}" method="post">
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
                        {{ $users->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
