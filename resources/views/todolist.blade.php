@extends('default')

@section('content')
    <div class="panel-center panel-center__larger">
        <div class="card">
            <div class="card-header">
                Totos
            </div>
            <div class="card-body">
                <div class="pull-right form-group" style="width: 50%">
                     <form method="post" action="/add">
                          <div class="input-group">
                              <input type="text" class="form-control" name="todo" value="@php if(isset($info['todo'])) { echo $info['todo'];} @endphp" />
                              <div class="btn-group">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                              </div>
                          </div>
                         @if($errors->any())
                             <span class="text-danger">{{$errors->first()}}</span>
                         @endif
                         {{ csrf_field() }}
                     </form>
                </div>
                <div style="clear: both;"></div>
                @if(count($lists))
                <table class="table table-bordered table-stripped">
                    <colgroup>
                        <col />
                        <col width="5%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Todo</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $item)
                        <tr>
                            <td>
                                {{$item->title}}
                            </td>
                            <td class="text-center"><a href="/delete/{{$item->id}}" class="btn btn-link btn-sm"><i class="fa fa-remove"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@stop