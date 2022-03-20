<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="imgs/Nexpayfavicon.jpeg" rel="icon" />
	<link href="img/apple-touch-icon.png" rel="apple-touch-icon" /><!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" /><!-- Vendor CSS Files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Nexpay | Lipa na Mpesa</title>
</head>
<body> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <img src="imgs/Nexpayfavicon.jpeg" alt="NEXPAY" width="50px;"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
     
    </ul>
  </div>
</nav>

    <div class="container">
    <form action="api.php" method="POST">
         <div class="row mt-5">
       <div class="col-md-6 pt-5">
     
        <div class="image-container" >
            <img src="imgs/img1.svg" alt="alternative" width="400px;"/>
          </div>
        </div>
      
            <div class="col-md-6 col-sm-8 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">NEXPAY</div>
                    <div class="card-body">
                        <div id="c2b_response"></div>
                        <form action="">
                      
                            <div class="form-group">
                                <label for="phone">Phone Number to Pay</span></label>
                                <input type="number" name="phone"  placeholder="07 * * * * * * * *" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" id="amount" required>
                            </div>
                           <div class="form-group">
                                <label for="account">Reason for Payment</label>
                               
                                <!-- <textarea class="form-control" name="account" id="account" rows="3" maxLength="30" onChange="checkInput(this)" onKeyup="checkInput(this)" autocomplete="off" required></textarea>
                            </div> -->
                            <select class="form-control" name="account">
                            <option selected dissabled>Select Reason for Payment</option>
                            <option value="Software">Software</option>
                            <option value="Hardware">Hardware</option>

                        </select>
                        </div>
                            <button id="stkpush" class="btn btn-primary" name="stk">Send</button>
                        </form>
                    </div>
                </div>
            </div>
</form>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
<!-- Page Content -->

