@extends('admin.messenger.template')

@section('title', $topic->subject)

@section('messenger-content')

    <div class="row">

        <div class="col-md-12">
            <div class="list-group" style="margin-top:8px;">
                @foreach($topic->messages as $message)
                    <div class="row list-group-item">
                        <div class="row">
                            <div class="col col-xs-9 {{ (in_array($message->id, $unreadMessages)?"unread":false) }}">
                                <i class="fa fa-user-circle-o"></i> {{ $message->sender->name }}
                            </div>
                            <div class="col col-xs-3" style="margin-top:-3px;">
                                {{   \Carbon\Carbon::parse($message->sent_at)->diffForHumans()/*format('d F Y h:i')*/ }}


                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="row list-group-item" style="padding-left:15px;background-color:lightgray;">
                            <div class="col col-xs-12">
                                {{ $message->content }}
                            </div>
                        </div>
                    </div>

                @endforeach
                <br/>
        <a href="{{ route('admin.messenger.edit', [$topic->id]) }}" class="btn btn-primary">Reply</a>
            </div>

        </div>
    </div>

    <style>
        .messenger-table tr:first-child td {
            border-top: 0 !important;
        }

        .unread {
            font-weight: bold;
        }

        .list-group-item {
            border-top: 0;
            border-bottom: 0;
        }

        .list-group-item:first-child {
            border-top: 1px solid #ddd;
        }

        .list-group-item:last-child {
            border-bottom: 1px solid #ddd;
        }

        .list-group-item:hover {
            background-color: #eee;
        }
    </style>

@endsection