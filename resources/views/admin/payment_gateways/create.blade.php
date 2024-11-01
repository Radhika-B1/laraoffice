@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.payment-gateways.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.payment_gateways.store'], 'files' => true,'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('name', trans('global.payment-gateways.fields.name').'*', ['class' => 'control-label form-label']) !!}
                    <div class="form-line">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('description', trans('global.payment-gateways.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('logo', trans('global.payment-gateways.fields.logo').'', ['class' => 'control-label']) !!}
                    {!! Form::file('logo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('logo_max_size', 10) !!}
                    {!! Form::hidden('logo_max_width', 4096) !!}
                    {!! Form::hidden('logo_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('logo'))
                        <p class="help-block">
                            {{ $errors->first('logo') }}
                        </p>
                    @endif
                </div>
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::close() !!}
@stop

