<!DOCTYPE html>
<html>
<head>
   @foreach($transferadmission as $utm)
    <title>{{  $utm->first_name." ".$utm->middle_name." ".$utm->surname }} Veritas Univeristy Abuja Admisssion Letter </title>
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

 <p align='center'> <img src="{{ asset('img/letter_logo.png') }}" width='100' height='100' border='0' /></p>
<p align='right'><strong>Date: {{  \Carbon\Carbon::parse($utm->approval_date)->format(' jS \of F Y ') }} </strong></p>
<p><strong>Dear Mr/Mrs/ Miss
{{  $utm->first_name." ".$utm->middle_name." ".$utm->surname }}
</strong></p>
<p align='center'><strong><u>ADMISSION INTO FULL-TIME  DEGREE PROGRAMME</u></strong></p>
<p>Following your application through Unified Tertiary Matriculation Examination (UTME) conducted by the Joint Admissions and Matriculation Board (JAMB) for the 2022/2023 academic session, I write to offer you a Provisional Admission into the
 {{ $utm->duration }}
year Degree Programme to study <strong>
 {{ $utm->course_applied }}
   in the Department of
   {{ $facultyAndDept['dept'] }}
   , Faculty of
    {{ $facultyAndDept['col']}}

    </strong>, of Institute of Consecrated Life in Africa (InCLA).</p>
<p>Please note that  your admission to the University is subject to your having the University  minimum and departmental entry qualifications in the prescribed programme and a  medical report showing that you are drug- free to study. The medical check may  be carried out in the University. The university reserves the right to withdraw  any candidate who is drug positive. <strong>Female  students are kindly requested to indicate their choice of hostel of residence. </strong></p>

<p><strong><u>This letter does  not replace the admission letter to be issued by the Joint Admissions and  Matriculation Board (JAMB) which is the authorised body for admissions into  Nigerian Universities</u></strong>. </p>
<p>If you accept the  offer, please Login into your Admission portal to pay a <u  style="color:red">NON-REFUNDABLE</u> acceptance fee of Hundred Thousand Naira (₦100,000:00) via Remita. The acceptance fee is NOT part of the  tuition fee.</p>
<p>You are therefore  expected to pay<strong> not less than a minimum of 50% of the total tuition fees via Remita.</strong> Please  note that accommodation is reserved on first-come first-served basis, on  evidence of payment. The balance of the total fees is expected to be paid at the beginning of the Second Semester of 2023/2024 session. </p>
<p><strong>This  offer of admission will lapse on 31th January, 2024 if the minimum  tuition and accommodation fees are not paid on or before that date. </strong>Please  consult our website <a href='http://www.veritas.edu.ng/'>www.veritas.edu.ng</a> for  fees, other charges and date of resumption.</p>
<p>You are to proceed  to the Admissions Office immediately you resume on campus for completion of  your admission process.</p>
<p>I congratulate you  on your admission to Institute of Consecrated Life in Africa (InCLA) and wish you success in your  programme.</p>
<p>Yours sincerely,
    {{--  <br><br><br><br>  --}}
<p align='left'> <img src="{{ asset('img/register.png') }}" width='100' height='60' border='0' /></p>

  <strong>Dr. (Mrs) Stella Chizoba Okonkwo, FCAI,  FIIA, JP</strong><br />
  <strong>Registrar</strong></p>
<p><strong>PLEASE NOTE:</strong></p>
<ol start='1' type='1'>
  <li>Accommodation on campus is mandatory.</li>
  <li>Squatting is NOT allowed.</li>
  <li>Secret Cult membership and activities in this University are strictly forbidden and punishable with expulsion.</li>
  <li>This offer can be withdrawn any time your entry qualifications are found to be unacceptable or your provisional admission disputed.</li>
</ol>
<p>I ,  ................................................................................................................... accept the terms of this admission.</p>
<p>Signature: ...........................................................................</p>
<p>Date: ...................................................................................</p>



<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>

<script>
      window.onload = function() {
            window.print();
        }
    </script>
@endforeach
</body>
</html>


