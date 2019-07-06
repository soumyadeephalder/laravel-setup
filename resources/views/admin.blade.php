@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss!
                    <br>
                    @if(Auth::guard('admin')->check())
                        user logged in as 'admin'
                        @else
                        user logged out as 'admin'
                    @endif;
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
