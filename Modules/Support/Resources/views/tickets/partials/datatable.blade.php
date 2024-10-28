@php
    use Illuminate\Support\Str;
@endphp


<table id="ticket-table" class="ticketit-table table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Agent</th>
            <th>Priority</th>
            <th>Owner</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        
        {{-- Loop through the data and generate table rows --}}
        @foreach($data as $row)
       
       
            <tr>
                <td>{{ $row->id }}</td>
                <td>{!! $row->subject !!}</td>
                <td>{!! $row->status !!}</td>
                <td>{{ $row->updated_at }}</td>
                <td>{{ $row->agent }}</td>
                <td>{!! $row->priority !!}</td>
                <td>{{ $row->owner }}</td>
                <td>{!! $row->category !!}</td>
            </tr>
           
        
        @endforeach
    </tbody>
</table>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#ticket-table').DataTable();
});
</script>