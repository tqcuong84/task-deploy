@extends('default')

@section('content')
    <div class="panel-center">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Sign in</h1>
                <form class="form-signin" method="post" action="/">
                    @if ($info['error'] != "")
                        <div class="alert alert-danger">
                            {{$info['error']}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$info["email"]}}" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="" />
                    </div>
                    <div class="form-group text-right">
                        <a href="/signup" class="btn btn-link btn-sm">Register an account</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                    <input type="hidden" name="action" value="signin" />
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@stop