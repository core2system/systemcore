
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@extends('layouts/layoutMaster')
@section('title', 'CLIENT MANAGMENTytre1')
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
           <th>Client Name</th>
           <th>Client Company</th>
           <th>Contact Number</th>
           <th>email</th>
           <th>Contract</th>
           <th>Employee Name</th>
           <th>Date hired</th>
           <th>Status</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
        @foreach($client as $emp)
        <tr class="contents">
          <td style="display:none;">{{$emp->contract_id}}</td>
          <td class="titles">{{$emp->clientname}}</td>
          <td>{{$emp->company}}</td>
          <td>{{$emp->contact}}</td>
          <td>{{$emp->email}}</td>
          <td>
           <?php

           $file=$emp->contract_file;
           if(empty($file)){?>
            <label>N/A</label>
            <?php
          }else{ 

            ?>
            <button class="btn  btn-sm btn-flat btn-primary">

              <a href="http://127.0.0.1:8000/assets/img/<?php echo $emp->contract_file;?>" style="color:white;" target="_blank" >
                view
              </a>
            </button>
          <?php }

          ?>
        </td>
        <td>{{$emp->employee}}</td>
        <td>{{$emp->date_hired}}</td>
        <td>{{$emp->sta}}</td>
        <td> 
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="ti ti-dots-vertical"></i>
            </button>
            <div class="dropdown-menu">      
              <form action="{{url('hired')}}" method="Post">
                @csrf
                @method('POST')
                <input type="hidden" name="contract_ids" value="{{$emp->contract_id}}">
                <a class="dropdown-item">
                  <button type="submit" class="btn  btn-success btn-sm btn-flat mb-3" style="font-size:15px;">
                   <i class="fas fa-check"></i>
                 </button>
                 Hired
               </a>
             </form>


                 <form action="{{url('cancel')}}" method="Post">
                @csrf
                @method('POST')
                <input type="hidden" name="cancel_id" value="{{$emp->contract_id}}">
                <a class="dropdown-item">
                  <button type="submit" class="btn  btn-danger btn-sm btn-flat mb-3" style="font-size:15px;">
                  <i class="fas fa-times-circle"></i>
                 </button>
                 Cancel
               </a>
             </form>
         </div>
       </div>
     </td>
   </tr>
   @endforeach
 </tbody>
</table>
</div>
</div>
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