<?php

if(!session('userid'))
{

  header('location: /');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>" >
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid m-1">

        <div class="d-inline-flex">
            <img class="card-img-top mb-2 mx-3" src="data:image/<?php echo e($receipt -> passport_type); ?>;base64,<?php echo e(base64_encode($receipt -> passport)); ?>" alt="Applicant Image" style="height: 70px; width:70px;">
            <h3 class="text-nowrap mx-5">Remita Payment Receipt</>
        </div>

        <div class="mb-2">
            <div class="d-flex">
                <ul class="m-2">
                    <li><b>Name: </b> <?php echo e($receipt->first_name." ".$receipt->middle_name." ".$receipt->surname); ?> </li>
                    <li><b>Phone: </b><?php echo e($receipt->phone); ?></li>
                </ul>
                <ul class="m-2">
                    <li><b>Email: </b> <?php echo e($receipt->email); ?></li>
                    <li><b>Gender: </b><?php echo e($receipt->gender); ?></li>
                    
                </ul>
            </div>
        </div>

        <table class="table table-bordered d-inline-flex p-2" cellspacing="0" width="60%">

            <tbody>
                <tr>
                    <td><b>RRR: </b><?php echo e($receipt->rrr); ?></td>
                    <td><b>Service: </b><?php echo e($receipt->fee_type); ?></td>
                        <td><b>Amount: </b>&#8358;<?php echo e(number_format($receipt->amount, 2)); ?> </td>
                    <td><b>Bank: </b> Unknown</td>

                </tr>
                <tr>
                    <td><b>Channel: </b><?php echo e($receipt->channel); ?> </td>
                    <td><b>Order: </b> <?php echo e($receipt->order_ref); ?></td>
                    <td><b>RRR Date: </b> <?php echo e(\Carbon\Carbon::parse($receipt->created_at)->format('d-m-Y')); ?></td>
                    <td><b>Payment Date: </b> <?php echo e(\Carbon\Carbon::parse($receipt->updated_at)->format('d-m-Y')); ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <script>
      window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/receipt.blade.php ENDPATH**/ ?>