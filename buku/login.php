<br>
<br>
<div class="container">
<h1 class="form-heading" align="center" style="background-color: rgb(0, 204, 204, 0.4)">LOGIN</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel" align="center">
   <p>Please enter your email and password</p>
   </div>
    <form id="Login" method="post" action="logincontroller.php">


  <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="uname">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pass">

        </div>
       



        <div class="forgot" align="center">
        <a href="reset.html">Forgot password?</a>

</div>
 <br>
        <center><button type="submit" class="btn btn-primary" >Login</button></center>
        </form>
<br>

        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Akun
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'registerform.php'; ?> <!--biar ga terlalu banyak jadi pakai include-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div> 
  </div>
</div>
</center>


    
    </div>

</div></div>




