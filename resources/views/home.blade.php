@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <ul>
                        @foreach ($discussions as $discussion)
                        <li>
                            <a href="{{ route('discussions.show',[$discussion]) }}">{{$discussion->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection