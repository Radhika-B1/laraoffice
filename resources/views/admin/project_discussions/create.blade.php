@extends('layouts.app')

@section('content')

    @include('admin.client_projects.operations.menu', array( 'client_project' => $project))
    
    <h3 class="page-title">@lang('global.project-discussions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.project_discussions.store', $project->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            @include('admin.project_discussions.form-fields', compact('project'))            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

  @include('admin.common.standard-ckeditor')

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
            });
            
        });
    </script>

<link href="{{ asset('css/cdn-styles-css/bootstrap/2.5.3/bootstrap-colorpicker.min.css') }}" rel="stylesheet">  


<script src="{{ asset('js/cdn-js-files/bootstrap/2.5.3') }}/bootstrap-colorpicker.min.js"></script>

<script>
    $('.colorpicker').colorpicker();
</script>
            
@stop