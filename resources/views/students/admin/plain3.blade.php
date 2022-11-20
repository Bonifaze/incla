<table border="1">
<tr>
    <td>SN</td>
    <td>Course</td>
    <td>Student Name</td>
    <td>Total Score</td>
    <td>Modified By</td>
    <td>Lecturer</td>
    <td>Updated At</td>
</tr>
@foreach($suspects as $key => $suspect)

    <tr>
        <td>{{$key}}</td>
        <td>{{ $suspect->programCourse->course->code }}</td>
        <td>{{ $suspect->student->full_name }} ({{ $suspect->student_id}})</td>
        <td>{{ $suspect->total }}</td>
        <td>{{ $suspect->modifiedBy->full_name }} ({{ $suspect->modified_by }}) </td>
        <td>{{ $suspect->programCourse->lecturer->full_name }} ({{ $suspect->programCourse->lecturer_id }}) </td>
        <td>{{ $suspect->updated_at }}</td>
    </tr>

@endforeach

</table>