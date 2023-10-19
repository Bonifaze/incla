@extends('layouts.mini')



@section('pagetitle')



<!-- Sidebar Links -->

<!-- Treeview -->
@section('cbt-open') menu-open @endsection

@section('cbt') active @endsection

<!-- Page -->
 @section('upload-questions') active @endsection

 <!-- End Sidebar links -->



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
          <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Result Bar Chat  <a href="/rbac/auditviewall"
                                                        class="float-right btn btn-outline-info">VIEW RESULT AUDIT</a>
                    </h1>



<canvas id="modificationChart" width="380" height="200"></canvas>






          <!-- /.box -->

        </div><br><br><br>
          <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       Course Result Bar Chat
                    </h1>

						  @foreach ($programs as $key => $program)
						   @php

							 @endphp
						   <tr>


							  <td>
                                 <a href="/program-courses/results/resultBarchatCourse/{{ $program->id }}" class="btn btn-outline-success">{{ $program->name }}</a>
                                 </td>




							</tr>

							@endforeach
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('pagescript')

<script>
    var ctx = document.getElementById('modificationChart').getContext('2d');
    {{--  var data = @json($programModifications);  --}}
     var data2 = @json($programModifications);
    {{--  console.log(data);  --}}
 var data = @json($programModifications->map(function($item) {
    return [
        'program_name' => $item->program->name,
        'result' => $item->ca2_score + $item->ca3_score + $item->ca1_score + $item->exam_score,
        // ... other data properties you want to include in the chart
    ];
})->toArray());



    var programs = data.map(item => item.program_name);
    var modificationCounts = data2.map(item => item.modification_count);
// Define an array of colors
    var colors = ['rgba(255,0,0)', 'rgba(0,255,0)', 'rgba(0,0,255)', 'rgba(255,255,0)', 'rgba(255,0,255)', 'rgba(0,255,255)', 'rgba(0,0,0)', 'rgba(0,0,128)', 'rgba(139,69,19)', 'rgba(188,143,143)']; // Add more colors if needed
    var backgroundColors = modificationCounts.map((count, index) => colors[index % colors.length]); // Use colors in a cyclic manner

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: programs,
            datasets: [{
                label: 'Result Count changes',
                data: modificationCounts,
                backgroundColor: backgroundColors,
               // backgroundColor: 'rgba(255,0,0)',
                borderColor: 'rgba(0,0,0)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



@endsection
