<div id="filters" class="collapse filters">
<div class="panel panel-default filters">
    <div class="panel-heading">
        <h3 class="panel-title">@lang('others.statistics.custom-filters')</h3>
    </div>
    <div class="panel-body">
        <form method="POST" id="search-form" class="form-inline" role="form">
        <div class="col-md-12">
                <div class="col-md-2">
            <div class="form-group">
                <label for="name">@lang('others.statistics.date')</label>
                <input type="text" class="form-control" name="date_filter" style="padding:2px;" id="date_filter" placeholder="@lang('others.statistics.select-date')" autocomplete="off">
            </div>
        </div>
                <div class="col-md-2">
            <div class="form-group">
                <label for="email">@lang('others.statistics.type')</label>
                <?php
                $date_types = array(
                    
                    'created_at' => trans('others.statistics.created'),
                    'start_date' => trans('global.invoices.fields.start-date'),
                    'due_date' => trans('global.invoices.fields.due-date'),
                );
                ?>
                {!! Form::select('date_type', $date_types, old('date_type'), ['class' => 'form-control select2',  'data-live-search' => 'true', 'data-show-subtext' => 'true', 'id' => 'date_type']) !!}     
            </div>
        </div>
                <div class="col-md-2">
            <div class="form-group">
                <label for="email">@lang('others.statistics.status')</label>

                 <?php
                 $statuses = \App\Models\TaskStatus::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
                ?>


                {!! Form::select('status', $statuses, old('statuses'), ['class' => 'form-control select2',  'data-live-search' => 'true', 'data-show-subtext' => 'true', 'id' => 'status_id_filter']) !!}
            </div>
        </div>
      
                <div class="col-md-2">
            <div class="form-group">
                <label for="email">@lang('others.statistics.employee')</label>

                <?php

                $filteremployees = \App\Models\User::whereHas("role",
            function ($query) {
                $query->where('id', getRoleIdSlug( ROLE_EMPLOYEE ));
            })->get()->pluck('name', 'id');
                ?>
                {!! Form::select('employee', $filteremployees, old('employee'), ['class' => 'form-control select2',  'data-live-search' => 'true', 'data-show-subtext' => 'true','placeholder' => 'Please select','id' => 'employee']) !!}
            </div>
        </div>

        <div class="col-md-2" style="margin-top:30px;">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">@lang('others.statistics.search')</button>&nbsp;
            <button type="reset" class="btn btn-danger" id="search-reset">@lang('others.statistics.reset')</button>
        </div>
      </div>
    </div>
        </form>
    </div>
</div>
</div>
@section('javascript')
@parent
@parent
<!-- Include Required Prerequisites -->
<script src="{{ asset('js/cdn-js-files') }}/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script src="{{ asset('js/cdn-js-files/daterangepicker') }}/daterangepicker.js"></script>

<link href="{{ asset('css/cdn-styles-css/daterangepicker/daterangepicker.css') }}" rel="stylesheet">


<script type="text/javascript">
    $(function () {
        let dateInterval = getQueryParameter('date_filter');
        let start = moment().startOf('week');
        let end = moment().endOf('isoWeek');
        if (dateInterval) {
            dateInterval = dateInterval.split(' - ');
            start = dateInterval[0];
            end = dateInterval[1];
        }
        
        $('#date_filter').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "alwaysShowCalendars": true,
            autoUpdateInput: false,
            startDate: start,
            endDate: end,
            
            locale: {
                format: '{{config('app.date_format_moment')}}',
                firstDay: 1,
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                'All time': [moment().subtract(30, 'year').startOf('month'), moment().endOf('month')],
            }
        }, function( start_date, end_date ) {
            $('#date_filter').val( start_date.format('{{config('app.date_format_moment')}}')+' - '+end_date.format('{{config('app.date_format_moment')}}') );
        });
    });

    

    function getQueryParameter(name) {
        const url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>
@stop