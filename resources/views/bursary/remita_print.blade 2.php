@extends('layouts.plain')

@section('pagetitle')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $student->full_name }} Remita Payment</title>

@endsection

@section('content')
    <body onload="window.print();">
<table width="650" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="650" valign="top"><table width="100%" height="80" border="0" cellpadding="0" cellspacing="0" colspan="2">
     <tr>
        <td align="center" valign="top">
            <a><img src="data:image/png;base64,{{$student->passport}}" class="img elevation-2" alt="Passport" width="100px"> </a>
        </td>
         <td align="center" valign="top"><h1><strong>Remita Payment Receipt </strong></h1></td>
      </tr>
    </table>
      <table width="100%" border="0">

        <tr>
          <td><strong>Name of Student: {{ $student->full_name }} </strong></td>
          <td><strong>  Matric. No.: {{ $academic->mat_no }} </strong></td>
        </tr>
        <tr>
          <td><strong>Phone: {{ $student->phone }} </strong></td>
          <td><strong>Gender: {{ $student->gender }} </strong></td>
        </tr>
        <tr>
          <td><strong>Programme: {{ $academic->program->name }} </strong></td>
          <td><strong>Email: {{ $student->email }} </strong></td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>



        <table width="100%" height="87" border="1" cellpadding="0" cellspacing="0">
                          <tr>
                            <td colspan="3"><strong>RRR</strong>: {{ $remita->rrr }}</td>
                            <td colspan="2" align="center"><strong>Service</strong>: {{ $feeType->name }} </td>
                            <td colspan="2"><strong>Amount</strong>: &#8358;{{ number_format($remita->amount, 2) }}</td>
                          </tr>
                        <tr>
                            <td colspan="3"><strong>Bank</strong>: {{ $remita->bankName($remita->bank_code) }}</td>
                            <td colspan="2" align="center"><strong>Channel</strong>: {{ $remita->channel }} </td>
                            <td colspan="2"><strong>Order</strong>: {{ $remita->order_id }}</td>
                        </tr>
                        <tr>
                           admin/departments/staff-list/
                        </tr>


                         </table>

        <table width="100%" border="0">

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2"><br />
                    ...............................................<br />
                    Generated and Stamped by<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name: {{$name}}</strong></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table></td>
  </tr>
</table>
@endsection
