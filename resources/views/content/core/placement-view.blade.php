<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@extends('layouts/layoutMaster')
@section('title', 'PLACEMENT MANAGEMENT')
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
<div class="">
  <div class="card">
    <div style="display:flex;margin-bottom:3%;">
      <button class="btn  btn-primary btn-sm btn-flat mt-3 " style="margin-left:7px;font-size:15px;width:13%;height:38px;"  id="openmodal"><i class="fas fa-plus-square"></i>Insert Info</button>
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
           <th>Applicant Name</th>
           <th>Applicant Id</th>
           <th>JObrole</th>
           <th>Department</th>
           <th>Contact</th>
           <th>Email</th>
           <th>Training Fee</th>
           <th>Status</th>
           <th>Action</th>
         </tr>
         <tbody>
          @foreach($applicant as $app)
          <tr class="contents">
            <td class="titles">{{$app->firstname}}</td>
            <td>{{$app->applicant_id}}</td>
            <td>{{$app->jobrole}}</td>
            <td>{{$app->department}}</td>
            <td>{{$app->contact}}</td>
            <td>{{$app->email}}</td>
            <td>{{$app->trainee_fee}}</td>
            <td>
             <?php 
             $status=$app->st;
             if($status=='post'){?>
               <span class="badge bg-primary">{{$app->st}}</span>
             <?php }?>
           </td>
           <td>
            <?php 
            $status=$app->st;
            if($status=='post'){?>
            <?php }else{ ?>
              <form  action="{{route('applicant.update')}}" id="formAuthentication" class="mb-3" method="POST">
                @csrf
                <input type="text" name="employee_id" value="{{$app->qualified_id}}" style="display:none;">
                <button class="btn  btn-primary btn-flat btn-sm">POST</button>
              </form>
            <?php }?>
          </td>
        </tr>
        @endforeach
      </tbody>
    </thead>
  </table>
</div>
</div>
</div>

<!-- Modal for insert  record  exam applicant -->
<div class="modal" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>APPLICANT EXAM </h5>
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
        <th>APPLICANT ID</th>
        <th>APPLICANT NAME</th>
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
         
          <td><button class="btn btn-primary btn-sm  btn-flat" id="add">ADD</button></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  <form method="POST" action="{{url('placementstore')}}">
   @csrf
   @method('POST')
   <div class="row" style="margin-top:5%;">
    <div class=" col-md-6"><label>APPLICANT ID</label>
      <input type="text" class="form-control" id="empid"  name="empid">
         <input type="hidden" class="form-control" id="rec_id"  name="rec_id">

    </div>

    <div class=" col-md-6"><label>APPLICANT NAME</label>
      <input type="text" class="form-control" id="fname" disabled>
    </div>
  </div>

  <div class="form-group">
    <label>Placement Fee</label>
    <input type="number" name="fee" class="form-control">
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





<script>
  $(document).on('click', '#modalclose', function () {
    $('#reviewModal').hide();
  });
  $(document).on('click', '#openmodal', function () {
    $('#reviewModal').show();
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






@endsection


