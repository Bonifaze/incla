<!DOCTYPE html>
<html>
<head>
   @foreach($pgadmission as $utm)
    <title>{{  $utm->first_name." ".$utm->middle_name." ".$utm->surname }} Institute of Consecrated Life in Africa (InCLA) Admisssion Letter </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
body {
  text-align: justify;
  text-justify: inter-word;
}
  @media print {
            html, body {
                width: 210mm;
                height: 297mm;
                margin: 0;
                padding: 0;
                transform: scale(0.83);
                transform-origin: top left;
            }
        }
</style>
</head>
<body>





<p align='center'><strong>VERITAS  UNIVERSITY, ABUJA</strong><br />
  <strong>(</strong>The Catholic University  of Nigeria)<br />
  <strong>Website: </strong><a href='http://www.veritas.edu.ng/'>http://www.veritas.edu.ng</a></p>
<p align='center'><strong>Motto: Seeking the Truth </strong></p>

<p align='center'> <img src="{{ asset('img/letter_logo.png') }}" width='100' height='100' border='0' /></p>  -
<p align='right'><strong>Date: {{  \Carbon\Carbon::parse($utm->approval_date)->format(' jS \of F Y ') }} </strong></pa>
<p><strong>Dear
{{  $utm->first_name." ".$utm->middle_name." ".$utm->surname }}
</strong></p>
<p align='center'><strong><u>PROVISIONAL ADMISSION INTO SCHOOL OF POSTGRADUATE STUDIES</u></strong></p>
<p>Following your application through PostGraduate (PG) for this academic session, I write to offer you a Provisional Admission into a higher degree of Institute of Consecrated Life in Africa (InCLA), I am pleased to inform
 {{--  {{ $utm->duration }}  --}}
 Programme to study <strong>
 {{ $utm->course_applied }}
   in the Department of
   {{ $facultyAndDept['dept'] }}
   , Faculty of
    {{ $facultyAndDept['col']}}

    </strong>, of Institute of Consecrated Life in Africa (InCLA).</p>
<p>Please note that  your admission to the University is subject to your having the University  minimum and departmental entry qualifications in the prescribed programme and a  medical report showing that you are drug- free to study. The medical check may  be carried out in the University. The university reserves the right to withdraw  any candidate who is drug positive. <strong>Female  students are kindly requested to indicate their choice of hostel of residence. </strong></p>

<p><strong><u>This letter does  not replace the admission letter to be issued by OFFICE OF THE DEAN, SCHOOL OF POSTGRADUATE STUDIES.</u></strong> </p>

<p>If you accept the  offer, please Login into your Admission portal to pay a <u  style="color:red">NON-REFUNDABLE</u> acceptance fee of Fifty Thousand Naira (₦50, 000:00) via the portal to secure your admissions. The acceptance fee is NOT part of the  tuition fee.</p>

<p>However, your admission is subject to your fulfilling the requirements for admission into the School of Postgraduate Studies as spelt out in the prospectus. All these will be satisfied before your eligibility for registration.</p>
<p><strong>This offer will lapse after a maximum of one semester following the date of issuance of this letter.</strong></p>
<p>Attached is a document that will help you proceed with the admission procedure and payment. </p>
<p>For further enquiries: </p>
<p>Contact the Secretary, School of Postgraduate Studies </p>
<p>Email: pgschool@veritas.edu.ng or consult our website www.veritas.edu.ng/spgs/ for fees, other charges and date of resumption. </p>
<p>Congratulation, <br>
<br><br><br>
{{--  <p align='left'> <img src="{{ asset('img/register.png') }}" width='80' height='80' border='0' /></p>  --}}

  <strong>Ms. Emy F. Nzekwu</strong><br />
  <strong>Secretary, School of Postgraduate Studies</strong></p>



    <script>
      window.onload = function() {
            window.print();
        }
    </script>
@endforeach
</body>
</html>


