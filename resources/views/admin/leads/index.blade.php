@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

<h3 class="page-title">@lang('global.users.title')</h3>


<div class="panel panel-default">
    <div class="panel-heading">
        List
    </div>

    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped ajaxTable @can('user_delete_multi') dt-select @endcan">
            <thead>
                <tr>
                    @can('user_delete_multi')
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    @endcan

                    <th>@lang('global.users.fields.business_name')</th>
                    <!-- <th>@lang('global.users.fields.phone')</th>
                    <th>@lang('global.users.fields.title')</th>
                    <th>@lang('global.users.fields.quantity')</th> -->
                    <th>&nbsp;</th>

                </tr>
            </thead>
        </table>
    </div>
</div>
@stop

@section('javascript') 
<script>
    @can('user_delete_multi')
        window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
    @endcan
    $(document).ready(function () {
       

        window.dtDefaultOptionsNew.columns = [@can('user_delete_multi')
            { data: 'massDelete', name: 'id', searchable: false, sortable: false },
        @endcan 
        { data: 'business_name', name: 'business_name' }, // Lead's business name
            // { data: 'contacts', name: 'contacts' }, // Contacts' phone numbers
            // { data: 'title', name: 'title' },
            // { data: 'quantity', name: 'quantity' }, // Quantity from business intelligence
            // { data: 'actions', name: 'actions', searchable: false, sortable: false }
        ];

        processAjaxTablesNew();
    });

</script>

@endsection