@extends('default')

@section('content')
    <div class="panel-center">
        <div class="card">
            <div class="card-body text-center">
                Welcome<br><strong class="text-larger">{{$info['name']}}</strong><br /><br><br>
                <a href="/signout" class="btn btn-link btn-sm">Signout</a>
            </div>
        </div>
    </div>
@stop