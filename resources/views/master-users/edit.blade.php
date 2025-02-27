@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-bold">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ $user->username }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role" required>

                                            <option value="Staff Kelurahan"
                                                {{ $user->role == 'Staff Kelurahan' ? 'selected' : '' }}>Staff Kelurahan
                                            </option>
                                            <option value="RT" {{ $user->role == 'RT' ? 'selected' : '' }}>RT
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            value="{{ $user->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>

                                            <option value="ACTIVE" {{ $user->status == 'ACTIVE' ? 'selected' : '' }}>
                                                ACTIVE</option>
                                            <option value="INACTIVE"
                                                {{ $user->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button-save pull-right">Update User</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
