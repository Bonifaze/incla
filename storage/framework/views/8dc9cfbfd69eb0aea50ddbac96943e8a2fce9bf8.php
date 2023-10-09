
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>" >
    <title><?php echo e($receipt->first_name." ".$receipt->middle_name." ".$receipt->surname); ?> REMITA RECEPT</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

 <style>
        .watermark {
            background: url('path-to-watermark-image.png') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.4; /* Adjust the opacity as needed */
            position: relative;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-1">

        <div class="d-inline-flex">

                    <img src="data:image/png;base64,<?php echo e(Auth::guard('student')->user()->passport); ?>"
                        class="card-img-top mb-2 mx-3" alt="User Image" style="width: 50px;">

            
            <h3 class="text-nowrap text-bold mx-5">Remita Payment Receipt</h3>
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
                    <td><b>Payment Date: </b> <?php echo e(\Carbon\Carbon::parse($receipt->transaction_date)->format('d-m-Y')); ?></td>
                </tr>
            </tbody>
        </table>
<div class="">
          <table width="100%" border="0">

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
            <?php if($receipt->authenticate_by==NULL): ?>
                 <td colspan="2" Class="text-danger"><br />
                  PENDING APPROVAL OF RECEIPT FROM BURSARY
                    </td>
            <?php else: ?>

                <td colspan="2"><br />
                 <td colspan="2" Class="text-success "\><br />


                     <div class="col-lg-6 text-left">
    <p class="text-danger font-weight-bold" style="margin-left:80px"><strong> <?php echo e(\Carbon\Carbon::parse($receipt->updated_at)->format('d/m/Y')); ?></strong></p>
    <div style="position: relative; display: block;">
        <img class="print-image"src="<?php echo e(asset('img/bursary.png')); ?>" width='350' height='200' border='0' style="position: absolute; top: -180px; left: 1px;" />
        
    </div>
     APPROVED  RECEIPT FROM BURSARY
</div>
            <?php endif; ?>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
        </div>


    </div>
    <script>
      window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/receipt.blade.php ENDPATH**/ ?>