@extends('admin.layout.index')

@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Report</li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@stop

@section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "Purchase History",
                    fill:false,
                    backgroundColor: 'rgb(41, 128, 185)',
                    borderColor: 'rgb(41, 128, 185)',
                    data: [20, 10, 5, 2, 20, 30, 31, 6, 7, 30, 32, 11]
                },{
                    label: "Sell History",
                    fill:false,
                    backgroundColor: 'rgb(142, 68, 173)',
                    borderColor: 'rgb(142, 68, 173)',
                    data: [24, 10, 15, 12, 18, 26, 30, 8, 9, 32, 27, 10]
                }]
            },

            // Configuration options go here
            options: {}
        });

    </script>
@stop