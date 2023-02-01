<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?php
include '../../../util.php';

$util = new Util();

$id = $util->testInput($_GET['id']);

if(isset($id) && $id != ''): ?>
    <script>
    Swal.fire({
        title: 'Do you want to delete?',
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `Dismiss`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire('This inspector have been deleted', '', 'success').then(function() { 
                window.location = './delete_inspector_confirm.php?id=<?php echo $id;?>';
            });
        } else if (result.isDenied) {
          Swal.fire('Discard the process', '', 'error').then(function() { 
                window.location = '../../gmp_inspection.php';
            });
        }
      })
      </script>

<?php endif ?>
</body>

</html>