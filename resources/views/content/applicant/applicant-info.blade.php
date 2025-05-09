<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')
@section('title','About')


@section('vendor-style')
@vite([
'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('page-style')
@vite([
'resources/assets/vendor/scss/pages/page-auth.scss'
])
@endsection

@section('vendor-script')
@vite([
'resources/assets/vendor/libs/@form-validation/popular.js',
'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
'resources/assets/vendor/libs/@form-validation/auto-focus.js'
])
@endsection

@section('page-script')
@vite([
'resources/assets/js/pages-auth.js'
])
@endsection


@section('content')

<style type="text/css">

  body{
    background-color:white;
  }
  .get-in-touch {
    max-width: 800px;
    margin: 50px auto;
    position: relative;

  }
  .get-in-touch .title {
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 3.2em;
    line-height: 48px;
    padding-bottom: 48px;
    color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
  }

  .contact-form .form-field {
    position: relative;
    margin: 32px 0;
  }
  .contact-form .input-text {
    display: block;
    width: 100%;
    height: 36px;
    border-width: 0 0 2px 0;
    border-color: #5543ca;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
  }
  .contact-form .input-text:focus {
    outline: none;
  }
  .contact-form .input-text:focus + .label,
  .contact-form .input-text.not-empty + .label {
    -webkit-transform: translateY(-24px);
    transform: translateY(-24px);
  }
  .contact-form .label {
    position: absolute;
    left: 20px;
    bottom: 11px;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
    color: #5543ca;
    cursor: text;
    transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
    transition: transform .2s ease-in-out, 
    -webkit-transform .2s ease-in-out;
  }
  .contact-form .submit-btn {
    display: inline-block;
    background-color: #000;
    background-image: linear-gradient(125deg,#a72879,#064497);
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 16px;
    padding: 8px 16px;
    border: none;
    width:200px;
    cursor: pointer;
  }


</style>
<div class="container-xxl  " style="padding:0;">
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary  " style="padding:0px;" >
  <div class="container-fluid">
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse justify-content-center mt-3" id="navbar-ex-7">
     <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{url('/') }}" style="font-size:20px">Home</a>
      
      <a class="nav-item nav-link  active" href="{{url('/about') }} "  style="font-size:20px">About</a>
      <a class="nav-item nav-link" href="{{url('/contact') }} "  style="font-size:20px">Contact</a>
      <?php   if (Auth::user()) {?>
        <a class="nav-item nav-link" href="{{url('/client')}}"  style="font-size:20px">Client Account</a>
        <a class="nav-item nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  style="font-size:20px;position:relative;top:-5px;"><button class="btn btn-success" >Logout</button></a>
        <form method="POST" id="logout-form" action="">
          @csrf
        </form>
      <?php } else {?>
       <a class="nav-item nav-link" href="{{url('/signup')}}"  style="font-size:20px;position:relative;top:-5px;">    
        <form method="POST" action="{{url('/signup')}}">
          @csrf
          @method('GET')
          <button type="submit" name="submit" class=" btn btn-success" id="update_btn">Sign Up</button>
        </form> 
      </a>
      <a class="nav-item nav-link" href="javascript:void(0) "  style="font-size:20px;position:relative;top:-5px;"><button class="btn btn-success" id="login">Login</button></a>
    <?php  } ?>

  </div>
</div>
</div>
</nav> 


<div class="container-xxl flex-grow-1 container-p-y">


  <div class="container-sm">

    @foreach($getdata as  $get)


    <div class="row">
      <label style="text-align:center;font-size:20px;margin-bottom:5%;margin-top:5%;">APPLICANT INFORMATION</label>

      <div class="col-md-5 "> 
        <div class="card" style="width: 25rem;">
          <img class="card-img-top" src="" alt="Card image cap" style="height:300px;">
          <div class="card-body">
            <h5 class="card-title " style="color:blue"></h5>
            <p class="card-text fw-bold text-center" style="text-transform:uppercase;"></p>
            <p class="card-text fw-bold text-center text-primary" style="text-transform:uppercase;"></p>
            <p class="card-text text-center" style="text-transform:uppercase;"></p>
            <div style="text-align:center;">
              <a  href="" style="margin-left:4px;font-family:sans-serif;">
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-7">

       <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">FIRST NAME</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->firstname}}" disabled>
        </div>
      </div>


      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">MIDDLE NAME</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->middlename}}" disabled>
        </div>
      </div>


      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">LAST NAME</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->lastname}}" disabled>
        </div>
      </div>


      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">AGE</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->age}}" disabled>
        </div>
      </div>


      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ADDRESS</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->address}}" disabled>
        </div>
      </div>



      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">EMAIL</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->email}}" disabled>
        </div>
      </div>



      <div class="row mb-3">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CONTACT NUMBER</label>
        <div class="col-sm-9">
          <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="{{$get->contact}}" disabled>
        </div>
      </div>
    </div>

    <div class="form-group" style="margin-top:9%;">



        <?php   if (Auth::user()) {?>

                  <?php


$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="coredb"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");

$getid=Auth::user()->code_id;
$app=$get->applicant_id;

$select="SELECT * FROM `core2_contract`  where  employee_id='$app' and  client_id='$getid'
";
$mysql=mysqli_query($conn,$select);
if(mysqli_num_rows($mysql)){ ?>
    <div style="text-align:center;margin-top:4%;">
      <button type="button" name="submit" class="btn btn-primary" style="display:none;" disabled> SELECTED CANDIDATE</button>
  </div>
<?php }else{?>

<form action="{{url('candidate')}}" method="POST">
      @csrf
            @method('POST')
  <input type="hidden" name="client_id"  value="<?php echo Auth::user()->code_id; ?>" >
  <input type="hidden" name="applicant_id" value="{{$get->applicant_id}}">
  <button  type="submit" name="submit" class=" btn btn-primary form-control">SELECT CANDIDATE</button>

</form>
<?php } ?>




<?php } ?>


      
    </div>

  </div>
  @endforeach


</div>
<!-- container-sm  end   -->





<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->

    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>CORE SYSTEM
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            LINK
          </h6>
          <p>
            <a href="#!" class="text-reset">ABOUT</a>
          </p>
          <p>
            <a href="#!" class="text-reset">CONTACT</a>
          </p>


        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>

          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>

          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i>blank</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            @example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->

  <!-- Copyright -->
</footer>
<!-- Footer -->

</div>
@endsection


<script >
  $(document).on('click', '#login', function () {
    $('#login_modal').modal('show');
  });
  $(document).on('click', '#modal_close', function () {
    $('#login_modal').modal('hide');
  });
</script>