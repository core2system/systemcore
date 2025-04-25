
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
                <button class="btn  btn-danger btn-sm btn-flat mb-3" style="font-size:15px;"><i class="fas fa-print"></i></button>
              Print Payslip</a>           
            </div>
          </div>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
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


