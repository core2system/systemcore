<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
              <label style="text-align:center;font-size:30px;margin-top:2%;">Payroll</label>

              <div class="card-body">


                <div style="display:flex;">
                  <div class="input-group" style="width:40%;margin-bottom:2%;">
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
                     <th>Employee ID</th>
                     <th>Employee Name</th>
                     <th>Jobrole</th>
                     <th>Basic</th>
                     <th>rate</th>
                     <th>Pagibig</th>
                     <th>Philhealth</th>
                     <th>SSS</th>
                     <th>Total Deduction</th>
                     <th>Net Pay</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>

                 @foreach($payroll  as $pay)
                 <tr class="contents">
                  <td class="titles">{{$pay->employee_id}}</td>
                  <td class="titles">{{$pay->firstname}} {{$pay->lastname}}</td>
                  <td>{{$pay->jobrole}}</td>
                  <td><?php $h=$pay->salary; echo number_format($h, 2);?></td>
                  <td>{{$pay->rate}}</td>
                  <td>{{$pay->pagibig}}</td>
                  <td>{{$pay->philhealth}}</td>
                  <td>{{$pay->sss}}</td>
                  <td><?php $p=$pay->total_deduction; echo number_format($p, 2);?></td>
                  <td>{{$pay->net_pay}}</td>
                  <td>{{$pay->created_at}}</td>
                  <td >
                    <?php  $s=$pay->sta; if($s=='Paid'){ ?>
                      <span style="color:green">Paid</span>
                    <?php }else{ ?>
                      <span style="color:red">Pending</span>
                    <?php } ?>
                  </td>
                  <td>
                   <button class="btn btn-danger" id="printing"><i class="fas fa-print" id="printing"></i></button>
                 </td>
               </tr>
               @endforeach
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 
</div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="payslip">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" style="text-align:center;">PAYSLIP</h5>
      </div>
      <div class="modal-body" id="payslipContent">
        <div class="row">
          <div class="col-md-4"><span><strong>EMPLOYEE ID:</strong> <p id="employee_id">08128121921</p></span></div>
          <div class="col-md-4"><span><strong>EMPLOYEE NAME:</strong> <p id="employee_name">Juanito Busa</p></span></div>
          <div class="col-md-4"><span><strong>DATE:</strong> <p id="date"></p></span></div>
          <div class="col-md-4"><span><strong>JOBROLE:</strong ><p id="jobrole"></p></span></div>
          <div class="col-md-4"><span><strong>RATE:</strong> <p id="rate"></p></span></div>

          <div class="col-md-12" style="margin-top:2%;margin-bottom:2%;text-align:center;"><strong>Contribution</strong></div>

          <div class="col-md-4"><span><strong>Pagibig:</strong><p id="pagibig"></p></span></div>
          <div class="col-md-4"><span><strong> Philhealth:</strong> <p id="philhealth"></p></span></div>
          <div class="col-md-4"><span><strong>SSS:</strong> <p id="sss"></p></span></div>

          <div class="col-md-4"><span><strong>TOTAL DEDUCTION:</strong> <p id="deduction"></p></span></div>
          <br>

          <div class="col-md-4"><span><strong>NET PAY:</strong><p id="netpay"></p></span></div>


        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" onclick="printPDF()">PRINT</button>
        <button type="button" class="btn btn-danger" id="mode">Close</button>
      </div>
    </div>
  </div>

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

  $(document).on('click', '#printing', function () {
    $('#payslip').modal('show');

    $('form')[0].reset();
    var tr = $(this).closest("tr").find('td');
    $('#employee_id').text(tr.eq(0).text());
    $('#employee_name').text(tr.eq(1).text());
    $('#jobrole').text(tr.eq(2).text());
    $('#rate').text(tr.eq(4).text());
    $('#pagibig').text(tr.eq(5).text());
    $('#philhealth').text(tr.eq(6).text());
    $('#sss').text(tr.eq(7).text());
     $('#deduction').text(tr.eq(8).text());
    $('#netpay').text(tr.eq(9).text());
    $('#date').text(tr.eq(10).text());

  });


    $(document).on('click', '#mode', function () {
       $('#payslip').modal('hide');
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




<script>
  function printPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.text("Payslip Details", 14, 10);

    let payslipContent = document.getElementById("payslipContent").innerText;
    doc.text(payslipContent, 14, 20);

    doc.save("Payslip.pdf");
  }



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


