</head>
<body>

<div>
    <?php
    if(isset($_POST['create'])){
          echo 'user submitted.';
    }?>

<div/>

<div>
      <form action="registration.php" method="POST">
       <div class="container">

          <div class="row">
                <div class="col-sm-3">
                     <h1>Registration<h1>
                     <p>Fill up the form with correct values.</p>
                     <hr class="mb-3">
                     <label for ="Firstname"><b>Firstname</b></label> 
                     <input class="form-control"name="Firstname"required>
             
                     <label for="lastname"><b>lastname</b></label>
                     <input class="form-control"name="lastname"required>

                     <label for ="Usercode"><b>usercode</b></label>
                     <input class="form-control"name="Usercode"required>

                     <label for ="Phone number"><b>phone number</b></label>
                     <input class="form-control"name="Phone number"required>

                     <label for ="Passcode"><b>passcode</b></label>
                     <input class="form-control"name="Passcode"required>
                     <hr class="mb-3">
                     <input type="submit"name="create"value="Sign Up">
        </div>      
      </form>
</div>
</body>
</html>