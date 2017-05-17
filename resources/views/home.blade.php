@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">MAC Filter List</div>

                @if($macs->isempty())
                    <div class="panel-body">List is Empty.</div>
                @else
                    <div class="panel-body">

                        {!! Form::open(['action' => 'MacController@delete']) !!}
                            @foreach ($macs as $mac)
                                
                                <div class="form-group">
                                  {!! Form::checkbox($mac->id) !!}&#9;{{$mac->name}}
                                </div>
                              
                            @endforeach

                            {!! Form::submit('Delete') !!}

                        {!! Form::close() !!}

                    </div>
                @endif

            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <a href="{{ route('edit') }}">
                <button  type="button" class="btn btn-default">Edit MAC Filter List</button>
            </a>

            <div id="on" name="on" align="center" style="margin-top: 2.5em; padding: 5px;">
                @if($on==='1')
                    <div class="alert alert-success">
                        <h5>System is ARMED</h5>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <h5>System is DISARMED</h5>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
                    
