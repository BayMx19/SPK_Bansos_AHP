@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-5">Home</h4>
                    </div>
                    <div class="card-body mt-5 mb-5">
                        <div class="welcome-text">
                            <h1>Hallo, Selamat Datang {{ Auth::user()->name }}!</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection