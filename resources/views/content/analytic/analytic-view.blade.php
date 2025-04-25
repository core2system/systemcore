<link rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
      type="text/css" />
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
        type="text/javascript">
</script>
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>


@extends('layouts/layoutMaster')
@section('title', 'TIMESHEET MANAGEMENT')
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
      <div class="card-datatable table-responsive">
 
 <div class="container">
        <h2>Line Chart</h2>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>


      </div>
    </div>
<script>
    let ctx = document.getElementById("myChart").getContext("2d");
    let myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday",
            ],
            datasets: [
                {
                    label: "work load",
                    data: [2, 9, 3, 17, 6, 3, 7],
                    backgroundColor: "rgba(153,205,1,0.6)",
                },
                {
                    label: "free hours",
                    data: [2, 2, 5, 5, 2, 1, 10],
                    backgroundColor: "rgba(155,153,10,0.6)",
                },
            ],
        },
    });
</script>

@endsection
