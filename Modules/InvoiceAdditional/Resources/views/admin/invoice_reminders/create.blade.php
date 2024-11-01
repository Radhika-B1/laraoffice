@extends('layouts.app')

@section('content')
<div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{PREFIX}}">@lang('global.invoice-reminders.title')</a></li>
            <li>Create</li>
        </ol>
    </div>
    @include('admin.invoices.invoice.invoice-menu', ['invoice' => $invoice])
    
    <h3 class="page-title">@lang('global.invoice-reminders.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.invoice_reminders.store', $invoice->id],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            @include('invoiceadditional::admin.invoice_reminders.form-elements')
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ asset('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                minDate:new Date()
            });
            
        });
    </script>
            
@stop