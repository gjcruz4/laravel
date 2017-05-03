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
                                  {!! Form::checkbox($mac->id) !!}&#9;{{$mac->address}}
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

        </div>
    </div>
</div>
@endsection
                    