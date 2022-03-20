<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css">
<style>
    body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
</style>

</head>
<body>
<script>
    Swal.fire(
  'Success!',
  'Payment done successfully!',
  'success'
  
)
.then((result) => {
      if (result.value) {
          Swal.fire(
              'Thank You!',
              'success',
              'timer: 1500',
              window.location.href = 'index.html'
          )
      }
  })

// Swal.fire({
//       title: 'Login Success',
//       text: 'Proceed to our Menu',
//       icon: 'success'
      
//   }).then((result) => {
//       if (result.value) {
//           Swal.fire(
//               'Logged in!',
//               'Enjoy your purchase.',
//               'success',
//               'timer: 15000',
//               window.location.href = 'index.html'
//           )
//       }
//   })
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  
</body>

</html>