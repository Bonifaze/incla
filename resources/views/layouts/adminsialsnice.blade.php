<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pagetitle') | Institute of Consecrated Life in Africa (InCLA), Abuja</title>
    <link rel="shortcut icon" href="{{ asset('img/uaes.png') }}">

    <!-- Meta Tags for Responsiveness -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('v3/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/demo.css') }}">

    @yield('css')  <!-- Custom Page-specific CSS -->
    <style>
    
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
        <!-- Sidebar -->
        @include('adminsials.side')
        
        <!-- Main Panel -->
        <div class="main-panel">
            <!-- Navbar -->
            @include('adminsials.nav')

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Footer -->
            @include('adminsials.foot')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/js/kaiadmin.min.js') }}"></script>
    @yield('pagescript')  <!-- Page-specific Scripts -->

       <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
</body>

</html>