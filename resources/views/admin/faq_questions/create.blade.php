@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.faq-questions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.faq_questions.store'],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('category_id', trans('global.faq-questions.fields.category').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
                </div>
            
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('question_text', trans('global.faq-questions.fields.question-text').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control', 'placeholder' => 'Question Text', 'required' => '','rows'=>'3']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_text'))
                        <p class="help-block">
                            {{ $errors->first('question_text') }}
                        </p>
                    @endif
                </div>
                </div>
            
                <div class="col-xs-12">
                <div class="form-group">
                    {!! Form::label('answer_text', trans('global.faq-questions.fields.answer-text').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer_text', old('answer_text'), ['class' => 'form-control editor', 'placeholder' => 'Answer Text', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer_text'))
                        <p class="help-block">
                            {{ $errors->first('answer_text') }}
                        </p>
                    @endif
                </div>
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']) !!}

    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    
    @include('admin.common.standard-ckeditor')
    @include('admin.common.modal-scripts')


@stop