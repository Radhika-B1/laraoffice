@extends('layouts.app')

@section('content')
<h3 class="page-title">
    {{$user->name}}


    @include('admin.common.drop-down-menu', [
    'links' => [
        [
            'route' => 'admin.leads.edit',
            'title' => trans('global.app_edit'),
            'type' => 'edit',
            'icon' => '<i class="fa fa-pencil-square-o" style="margin-right: 15px;"></i>',
        ],
        [
            'route' => 'admin.leads.destroy',
            'title' => trans('global.app_delete'),
            'type' => 'delete',
            'icon' => '<i class="fa fa-trash-o" style="margin-right: 5px;color:#ff0000;padding-left: 20px;"></i>',
            'redirect_url' => url()->previous(),
        ],
    ],
    'record' => $user,
])
</h3>

    <!-- Nav tabs -->
    <div class="panel-body table-responsive">
     </div>
        
@endsection