@extends('layouts.app')
@section('content')
@section('header')

    <x-page-header header="Employee / {{$user->name}} / Edit"/>

@endsection

<div class="row">
    <div class="col-12 pt-2">
        <form action="{{route('users.update',$user->id)}}" method="POST" class="border p-3 mt-2 bg-gray-200 card card-body">
            @csrf
            @method('PUT')
            <div class="control-group text-left">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Someone" name="name" value="{{$user->name}}" autofocus>
                @error('name')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group text-left mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                       placeholder="someone@somewhere.com" name="email" value="{{$user->email}}">
                @error('email')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group text-left mt-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group text-left mt-2">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password"
                       name="password_confirmation">
                @error('password_confirmation')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group text-left mt-2">
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control" id="phone_number"
                       placeholder="09199292939" name="phone_number" value="{{$user->phone_number}}">
                @error('phone_number')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group text-left mt-2">
                <label for="role">Role</label>
                <select class="form-control form-select" aria-label="Default select example" name="role">
                    <option disabled>Select Role</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="cashier" {{ $user->role == 'cashier' ? 'selected' : '' }}>cashier</option>
                    <option value="stocker" {{ $user->role == 'stocker' ? 'selected' : '' }}>stocker</option>
                </select>
                @error('role')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="control-group  text-center mt-2">
                <button class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
