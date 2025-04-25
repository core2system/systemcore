
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>




@extends('layouts/layoutMaster')
@section('title', 'Payroll')
@section('vendor-style')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss')
@endsection

@section('page-style')
@vite('resources/assets/vendor/scss/pages/app-chat.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')
@endsection
@section('page-script')
@vite('resources/assets/js/app-chat.js')
@endsection
@section('content')

<div class="card">
  <div class="card">
    <div style="display:flex;">

      <button class="btn  btn-primary btn-sm btn-flat mt-3 " style="margin-left:7px;font-size:15px;width:13%;height:38px;"  id="openmodal"><i class="fas fa-plus-square"></i>Create payroll</button>

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

       <tbody>
        @foreach($payroll  as $pay)
        <tr>
          <td>{{$pay->employee_id}}</td>
          <td>{{$pay->firstname}} {{$pay->lastname}}</td>
          <td>{{$pay->jobrole}}</td>
          <td>basic</td>
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
           <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="ti ti-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">
                          <a class="dropdown-item">
                <button class="btn  btn-success btn-sm btn-flat mb-3" style="font-size:15px;" id="update"><i class="far fa-edit"></i></button>
              Update</a>

              <?php  $s=$pay->sta; if($s=='Pending'){ ?>
  <form action="{{url('payrollupdate')}}" method="Post">
                   @csrf
                <input type="hidden" name="payroll_id" value="{{$pay->payroll_id}}">
                 <a class="dropdown-item">
                <button type="submit" class="btn  btn-success btn-sm btn-flat mb-3" style="font-size:15px;" id="paid"><i class="fas fa-money-check-alt"></i>
                </button>
              Paid</a>
            </form>

  <?php } ?>
            
            </div>
          </div>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
</div>


<!-- Modal for insert  record  exam applicant -->
<div class="modal" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>PAYROLL INFO </h5>
      </div>
      <div class="modal-body">
        <?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="coredb"; // Database name 
$tbl_name="information"; // Table name 
$conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
?>
<div class="col-md-12" style="margin-bottom:5%;">
  <div class="form-group">
    <p>EMPLOYEE ID</p>
    <input type="text" name="" placeholder="EMPLOYEE ID  OR EMPLOYEE NAME" class="form-control">
  </div>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>EMPLOYEE ID</th>
        <th>EMPLOYEE NAME</th>
        <th>JOBROLE</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <?php 
    $selet ="SELECT *,core1_applicant_apply.status as  applystatus FROM `core1_applicant_apply`  inner  JOIN core1_applicant on  core1_applicant.applicant_code=core1_applicant_apply.applicant_id INNER JOIN core1_recruitment on core1_recruitment.recruitment_id=core1_applicant_apply.recruitment_id where core1_applicant_apply.status='Qualified'";
    $query=mysqli_query($conn,$selet);
    ?> 
    <tbody>
      <?php while($row=mysqli_fetch_assoc($query)){?>
        <tr>
          <td><?php echo  $row['applicant_code']?></td>
          <td><?php echo  $row['firstname']?> <?php echo  $row['lastname']?></td>
          <td><?php echo $row['jobrole']?></td>
          <td style="display:none;"><?php echo $row['recruitment_id']?></td>
          <td style="display:none;"><?php echo $row['salary']?></td>
          <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  <form method="POST" action="{{url('payrollstore')}}">
   @csrf
   @method('POST')
   <div class="row" style="margin-top:5%;">
    <div class=" col-md-6"><label>EMPLOYEE ID</label>
      <input type="text" class="form-control" id="empid"  name="empid">
      <input type="hidden" class="form-control" id="rec_id"  name="rec_id">

    </div>

    <div class=" col-md-6"><label>EMPLOYEE NAME</label>
      <input type="text" class="form-control" id="fname" >
    </div>

    <div class=" col-md-6 mt-2"><label>FROM</label>
      <input type="date" class="form-control" name="from" >
    </div>

    <div class=" col-md-6 mt-2"><label>TO</label>
      <input type="date" class="form-control" name="to" >
    </div>


  <div class=" col-md-6 mt-2"><label>salary</label>
      <input type="text" class="form-control"name="basic_rate" id="basic_rate" >
    </div>

    <div class=" col-md-6 mt-2"><label>TOTAL HRS</label>
      <input type="text" class="form-control" name="total_hrs" >
    </div>

<label style="margin-top:3%;margin-bottom:3%;text-align:center;">--------------------------------BENEFIT--------------------------------</label>
  

    <div class=" col-md-3 mt-2"><label>PAGIBIG</label>
      <input type="number" class="form-control" name="pagibig" id="fname" value="600" >
    </div>

    <div class=" col-md-3 mt-2"><label>PHILHEALTH</label>
      <input type="number" class="form-control" name="philhealth" id="philhealth" value="600">
    </div>

    <div class=" col-md-3 mt-2"><label>SSS</label>
      <input type="number" class="form-control"  name="sss" id="sss" value="505">
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" id="modalclose">Close</button>
      <button type="submit" class="btn btn-primary" >Save</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>





</div>



<!-- Modal for insert  record  exam applicant -->
<div class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="ggg" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>PAYROLL INFO </h5>
      </div>
      <div class="modal-body">
       
       <div class="row">
         <div class="col-md-4">EMPLOYEE ID:89812121</div>
         <div class="col-md-4">FULLNAME:GERSON PUZON</div>
         <div class="col-md-4">DATE:GERSON PUZON</div>
         <div class="col-md-4">RATE:GERSON PUZON</div>

       </div>  

    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" id="modalclose">Close</button>
      <button type="button" class="btn btn-primary" onclick="printJS('payroll', 'html')" >PRINT</button>
    </div> 
</div>
</div>
</div>
</div>






@endsection



<script >
  $(document).on('click', '#modal_close', function () {
    $('#payroll_edit').modal('hide');

  });

</script>


<script >
  $(document).on('click', '#update', function () {
    $('#payroll_edit').modal('show');

  });

</script>



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



<script>
  $(document).on('click', '#modalclose', function () {
    $('#reviewModal').hide();
  });
  $(document).on('click', '#openmodal', function () {
    $('#reviewModal').show();
  });


    $(document).on('click', '#modalclose', function () {
    $('#reviewModal').hide();
  });
  $(document).on('click', '#openpayroll', function () {
    $('#payroll').show();
  });





  
  $(document).on('click', '#updatedataclose', function () {
    $('#updatemodal').hide();
  });
  $(document).on('click', '#add', function () {
   $('form')[0].reset();
   var tr = $(this).closest("tr").find('td');
   $('#empid').val(tr.eq(0).text());
   $('#fname').val(tr.eq(1).text());
   $('#fname').val(tr.eq(1).text());
   $('#rec_id').val(tr.eq(3).text());
   $('#basic_rate').val(tr.eq(4).text());
 });
</script>