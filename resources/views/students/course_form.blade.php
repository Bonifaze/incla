@extends('layouts.plain')

@section('pagetitle')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $student->full_name }} COURSE FORM</title>
@endsection

<script>
    window.onload = function() {
        window.print();
    }
</script>

@section('content')
<style>
    /* General Body Styling */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        position: relative;
    }

    .content-wrapper {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Watermark */
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg); /* Rotate watermark */
        font-size: 60px;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.1); /* Light opacity for text */
        text-align: center;
        z-index: -1; /* Behind the content */
        pointer-events: none; /* Ensure it doesn't block interactions */
        white-space: nowrap;
    }

    .watermark img {
        width: 150px;
        opacity: 0.01; /* Light opacity for logo */
        display: block;
        margin: 0 auto;
    }

    .watermark p {
        margin-top: -20px;
        font-size: 30px;
        color: rgba(211, 205, 205, 0.1); /* Light opacity for text */
    }

    /* Table Styling */
    table {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        position: relative; /* Ensure table stays in front of watermark */
    }

    td, th {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #D3D3D3;
    }

    /* Header Layout */
    .logo {
        width: 80px;
        max-width: 80px;
    }

    .student-passport {
        width: 80px;
        height: 80px;
    }

    /* Header and Title Style */
    h1 {
        text-align: center;
        font-size: 24px;
    }

    h3 {
        text-align: center;
        font-weight: bold;
        color: #4CAF50;
        margin-top: 20px;
    }

    /* Print Styles */
    @media print {
        body {
            margin: 0;
            padding: 0;
            background-color: white;
        }

        /* Prevent page breaks inside tables */
        table, th, td {
            page-break-inside: avoid;
            border: 1px solid #000;
        }

        /* Adjust logo size for printing */
        .logo {
            width: 60px;
            max-width: 60px;
        }

        .student-passport {
            width: 80px;
            height: 80px;
        }

        /* Adjust text size for print */
        td, th {
            font-size: 12px;
        }

        /* Make sure all content fits within A4 size */
        .content-wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }

        /* Ensure the title (h3) is centered and bold */
        h3 {
            text-align: center;
            font-weight: bold;
        }
    }

    /* Responsive layout adjustments */
    @media (max-width: 768px) {
        td, th {
            font-size: 14px;
        }

        .logo {
            width: 50px;
        }

        .student-passport {
            width: 60px;
            height: 60px;
        }
    }
</style>

<body>
    <div class="content-wrapper">
        <!-- Watermark with logo and name of the school -->
        <div class="watermark">
            <img src="{{ asset('img/letter_logo.png') }}" alt="School Logo" />
            <p class="text-gray">Institute of Consecrated Life in Africa</p>
        </div>

        <table>
            <tr>
                <td height="650" valign="top">
                    <!-- Header with school logo and name on the same line -->
                    <table width="100%" height="80" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <!-- School Logo (left) -->
                            <td width="20%" align="left">
                                <img src="{{ asset('img/letter_logo.png') }}" alt="School Logo" class="logo" />
                            </td>

                            <!-- School Name (center) -->
                            <td width="60%" align="center">
                                <h1><strong>Institute of Consecrated Life in Africa</strong></h1>
                            </td>

                            <!-- Student Passport (right) -->
                            <td width="20%" align="right">
                                <img src="data:image/jpeg;base64,{{ $student->passport }}" alt="{{ $student->full_name }} Image" class="student-passport" />
                            </td>
                        </tr>
                    </table>

                    <!-- Centered Course Form Title -->
                    <h3 class="text-success bold">COURSE FORM</h3>

                    <!-- Student Details Section in a Box -->
                    <table width="100%" cellpadding="5" cellspacing="0" style="margin-top: 20px;">
                        <tr style="background-color: #D3D3D3;">
                            <td colspan="2"><strong>Student Details</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Name of Student: </strong>{{ $student->full_name }}</td>
                            <td><strong>Matric. No.: </strong>{{ $academic->mat_no }}</td>
                        </tr>
                        <tr>
                            <td><strong>Academic Session: </strong>{{ $session->name }}</td>
                            <td><strong>Gender: </strong>{{ $student->gender }}</td>
                        </tr>
                        <tr>
                            <td><strong>Programme: </strong>{{ $academic->program->name }}</td>
                            <td><strong>Dept: </strong>{{ $academic->program->department->name }}</td>
                        </tr>
                    </table>

                    <!-- Academic Session Table -->
                    <table width="100%" height="87" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
                        <tr style="background-color: #D3D3D3;">
                            {{-- <td colspan="5" align="center"></td> --}}
                        </tr>
                        <tr style="background-color: #D3D3D3;">
                            <td width="5%" align="center"><strong>S/N</strong></td>
                            <td width="15%" align="center"><strong>Course Code</strong></td>
                            <td width="40%" align="center"><strong>Course Title</strong></td>
                            <td width="10%" align="center"><strong>Credit Unit</strong></td>
                            <td width="20%" align="center"><strong>Remark</strong></td>
                        </tr>

                        @php
                            $totalCredits = 0;
                        @endphp

                        @foreach ($courseform as $key => $course)
                            @php
                                $totalCredits += $course->course_unit;
                            @endphp
                            <tr>
                                <td align="center">{{ $key + 1 }}</td>
                                <td align="center" ><strong>{{ $course->course_code }}</strong></td>
                                <td align="center">{{ $course->course_title }}</td>
                                <td align="center">{{ $course->course_unit }}</td>
                                <td align="center"></td>
                            </tr>
                        @endforeach

                        <tr style="background-color: #D3D3D3;">
                            <td colspan="3" align="center"><strong>Total</strong></td>
                            <td align="center"><strong>{{ $totalCredits }}</strong></td>
                            <td align="center"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
@endsection
