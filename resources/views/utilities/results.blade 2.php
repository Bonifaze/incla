<table border="1">
    <tr>
    <td>SN</td>
        <td>Data Id</td>
    <td>Course</td>
    <td>Lecturer</td>
    <td>Lecturer</td>
    <td>Program</td>
    <td>Status</td>
</tr>
                @foreach($program_courses as $key => $program_course)

                <tr class="table-success">
        <td>{{$key}}</td>
        <td>{{ $program_course->course->code }}</td>
        <td>{{ $program_course->id }}</td>
        <td>{{ $program_course->lecturer->full_name }} </td>
        <td>{{ $program_course->lecturer->phone }} </td>
        <td> {{ $program_course->program->name }}</td>
        <td {!!$program_course->statusColor()!!}>{{ $program_course->status }}</td>
    </tr>

               @endforeach

</table>