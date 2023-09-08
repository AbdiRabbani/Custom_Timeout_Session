@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{url('/create')}}" method="post" class="p-3">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                    <label for="">level</label>
                    <select name="level" id="" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control">
                    <div class="text-right mt-3">
                        <button class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
            <div class="card mt-4 table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr>
                            <td>
                                {{$row->name}}
                            </td>
                            <td>
                                {{$row->email}}
                            </td>
                            <td>
                                {{$row->level}}
                            </td>
                            <td>
                                <form action="{{url('delete', $row->id)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
