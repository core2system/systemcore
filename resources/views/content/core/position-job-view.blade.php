<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



@extends('layouts/layoutMaster')
@section('title', 'history')
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





<div class="container-xxl flex-grow-1 container-p-y ">
 <div class="card-body">
   <div class="container" style="margin-top:3%;">
     <div class="row">
      <!-- Total Profit -->
      @foreach($post as  $pos)

      <div class="col-xl-3 col-md-4 col-6 mb-4">
        <div class="card bg-primary">
          <img class="card-img-top" src="{{ asset('assets/img/'.$pos->m) }}" alt="Card image cap" style="height:300px;">
          <div class="card-body">
            <h5 class="card-title " style="color:white"></h5>
            <p class="card-text fw-bold text-center" style="text-transform:uppercase;color:white;">{{$pos->firstname}} {{$pos->middlename}} {{$pos->lastname}}</p>
            <p class="card-text fw-bold text-center " style="text-transform:uppercase;color:black">{{$pos->jobrole}}</p>
            <p class="card-text text-center" style="text-transform:uppercase;color:white;">{{$pos->description}}</p>
          </div>
        </div>
      </div>

      @endforeach
    </div>

  </div>
</div>
</div>



@endsection







