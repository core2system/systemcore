<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')
@section('title','PROFILE')


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


<style type="text/css">

  body{
    background-color:white;
  }




</style>
@section('content')
<div class="container-xxl  " style="padding:0;">
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary  " style="padding:0px;" >
  <div class="container-fluid">
   <a class="navbar-brand" href="javascript:void(0)"></a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse justify-content-center mt-3" id="navbar-ex-7">
     <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{url('/employee/payroll/view')}}"  style="font-size:20px">Employee Payroll</a>
      <a class="nav-item nav-link" href="{{url('/employee/contract/view')}}"  style="font-size:20px">Employee Contract</a>
      <a class="nav-item nav-link" href="{{url('/employee/profile/view')}}"  style="font-size:20px">Profile Account</a>

      <a class="nav-item nav-link" href="javascript:void(0) "  style="font-size:20px;position:relative;top:-5px;">    
      </a>
      <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  style="font-size:20px;position:relative;top:-5px;"><button class="btn btn-success" >Logout</button></a>
      <form method="POST" id="logout-form" action="{{route('logout') }}">
        @csrf
      </form>

    </div>
  </div>
</div>
</nav> 




<div class="container-xxl flex-grow-1 container-p-y">

  <div id="content">

    <section>
      <div class="container py-5">
        <div class="row">

          <div class="col-lg-12">
            <div class="card mb-4">
              <label style="text-align:center;font-size:30px;margin-top:2%;">COMPANY CONTRACT</label>
              <div class="card-body">
                <div class="card-datatable table-responsive">
                  <table class="datatables-projects table border-top">
                    <thead>
                      <tr>
                       <th>Company Name</th>
                       <th>Company Address</th>
                       <th>Company Contact</th>
                       <th>Contract</th>
                       <th>Date hired</th>
                       <th>Status</th>
                     </tr>
                   </thead>
                   <tbody>    
                     @foreach($emp as $m)
                     <tr class="contents">
                       <td class="titles">{{$m->company}}</td>
                       <td class="titles">{{$m->company_address}}</td>
                       <td class="titles">{{$m->c}}</td>
                       <td><?php

                       $file=$m->contract_file;
                       if(empty($file)){?>
                        <label>N/A</label>
                        <?php
                      }else{ 
                        ?>
                        <button class="btn  btn-sm btn-flat btn-primary">

                          <a href="http://127.0.0.1:8000/assets/img/<?php echo $m->contract_file;?>" style="color:white;" target="_blank" >
                            view
                          </a>
                        </button>
                      <?php }

                    ?></td>
                    <td>{{$m->date_hired}}</td>
                    <td>{{$m->sta}}</td>
                  </tr>

                @endforeach</tbody>

                
              </table>







            </div>
          </div>
        </div>
      </div>
    </div>
  </section>










</div>


</div>





<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">


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
            <i class="fas fa-gem me-3"></i>core SYSTEM
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
            @gmail.com
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



</footer>
<!-- Footer -->


</div>
@endsection


<script >
  $(document).on('click', '#open_profile', function () {
    $('#login_modal').modal('show');
  });
  $(document).on('click', '#modal_close', function () {
    $('#login_modal').modal('hide');
  });
</script>



<script >
  $(document).on('click', '#edit_profile', function () {
    $('#profile_modal').modal('show');
  });
  $(document).on('click', '#applicant_close', function () {
    $('#profile_modal').modal('hide');
  });
</script>