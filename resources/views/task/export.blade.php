<table>
    <thead>
        <tr>
            <th>Project</th>
            <th>Person</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Priority</th>
            <th>Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $list)
            <tr>
                <td>{{ $list->project->name }}</td>
                <td>{{ $list->person->full_name }}</td>
                <td>{{ $list->start_time }}</td>
                <td>{{ $list->end_time }}</td>
                <td>{{ $list->priority }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>