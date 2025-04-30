<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')


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
</style>
@section('content')


<style type="text/css">

  body{
    background-color:white;
  }
</style>

<div class="container-xxl  " style="padding:0;">
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary  " style="padding:0px;" >
  <div class="container-fluid">
   <a class="navbar-brand" href="javascript:void(0)"></a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse justify-content-center mt-3" id="navbar-ex-7">
     <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{url('/') }}" style="font-size:20px">Home</a>
      <a class="nav-item nav-link" href="{{url('/about') }}"  style="font-size:20px">About</a>
      <a class="nav-item nav-link" href="{{url('/contact') }}"  style="font-size:20px">Contact</a>


      <?php   if (Auth::user()) {?>
         <a class="nav-item nav-link" href="{{url('/employee/info')}}"  style="font-size:20px">Employee Info</a>

        <a class="nav-item nav-link" href="{{url('/client')}}"  style="font-size:20px">Client Account</a>
        <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  style="font-size:20px;position:relative;top:-5px;"><button class="btn btn-success" >Logout</button></a>
        <form method="POST" id="logout-form" action="{{route('logout') }}">
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
    <?php  }?>
  </div>
</div>
</div>
</nav> 
<div class="container-fluid">

<div  style="height:500px;margin-top:10%;">
  

    <div class="card" >
  <h2 style="text-align;center">EMPLOYEE INFO</h2>
    <div style="display:flex;margin-bottom:3%;">
      <form class=" mt-3 ml-3 mw-100 navbar-search"  style="margin-left:7px" autocomplete="off">
        <div class="input-group">
          <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" >
          <div class="input-group-append">
            <button class="btn btn-primary" type="button" style="height:40px;">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-datatable table-responsive">
      <table class="datatables-projects table border-top">
        <thead>
          <tr>

           <th>Employee Name</th>
           <th>Contract</th>
           <th>Date hired</th>
           <th>Status</th>
           <th>Action</th>
         </tr>
       </thead>

       <tbody>
        @foreach($emp as $m)
         <tr class="contents">
          <td style="display:none;">{{$m->contract_id}}</td>
           <td class="titles">{{$m->employee}}</td>
           <td>     <?php

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
               <td><button class="btn btn-danger btn-sm btn-flat" id="open_resume">Upload Contract</i>  </button></td>
         </tr>
         @endforeach
       </tbody>

</table>
</div>
</div>
</div>




<div class="modal" tabindex="-1" role="dialog" id="update_status">
  <div class="modal-dialog" role="document">
   <form method="POST" action="{{route('login')}}">
    @csrf
    @method('POST')

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="text-align:center;">LOGIN TO YOUR ACCOUNT</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Email</label>
          <input  type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input  type="password" class="form-control" name="password">
        </div>
        <div class="modal-footer">
          <button type="SUBMIT" class="btn btn-primary">Log in</button>
          <button type="button" class="btn btn-danger" id="modal_close">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="resume_modal">
  <div class="modal-dialog" role="document">
   <form method="POST"   action="{{url('storecontract')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="text-align:center;">UPLOAD CONTRACT</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">

          <input  type="file" class="form-control" name="contract_file">
        </div>

        <input  type="text" class="form-control" name="contract_id" id="contract_id" style="display:none;">

        <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
          <button type="button" class="btn btn-danger" id="modal_close">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>



<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>core
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
    <!-- Copyright -->
  </footer>
<!-- Footer -->


</div>
@endsection



<script type="text/javascript">


 $(document).ready(function(){
  $('#myInput').keyup(function(){
// Search text
    var text = $(this).val();
// Hide all content class element
    $('.contents').hide();

// Search 
    $('.contents .titles:contains("'+text+'")').closest('.contents').show();
  });

});




</script>


<script >
  $(document).on('click', '#open_resume', function () {
    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#contract_id').val(tr.eq(0).text());
    $('#resume_modal').modal('show');
  });

  $(document).on('click', '#modal_close', function () {
    $('#resume_modal').modal('hide');
  });

</script>
