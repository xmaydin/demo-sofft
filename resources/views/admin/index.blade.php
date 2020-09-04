@extends('admin.includes.app')
@section('content')

    <div class="row" id="secondRow">
        <div class="col-md-4">
            <h2 style="margin-bottom: 60px; color: darkblue">Dashboard</h2>
            <div class="row" style="margin-bottom: 30px">
                <div class="col-md-6">
                    <h3 style="color: #007bff">£2.395</h3>
                    <p style="font-size: 12px">Number of purchases</p>
                </div>
                <div class="col-md-6">
                    <h3 style="color: #007bff">£2.395</h3>
                    <p style="font-size: 12px">Number of purchases</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 style="color: #007bff">£2.395</h3>
                    <p style="font-size: 12px">Number of purchases</p>
                </div>
                <div class="col-md-6">
                    <h3 style="color: #007bff">£2.395</h3>
                    <p style="font-size: 12px">Number of purchases</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <canvas id="myChart"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [3, 5, 7, 12, 8, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            </script>
        </div>
    </div>

    <div class="row" id="thirdRow">
        <div class="col-md-12 ">
            <h2 style="margin-bottom: 30px; color: darkblue">Staff Report
                <a href="{{ route('admin.addnew') }}" class="btn btn-outline btn-outline-primary btn-sm pull-right"><i class="fa fa-plus"> Add New</i></a>
            </h2>
            @if(session("status"))
                <div class="alert alert-info" role="alert">
                    {{session("status")}}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <table id="example" class="stripe table-borderless" style="width:100%; ">
                <thead style="background-color: #007bff ;color: #dedede">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Edit/Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($personel as $key => $val )

                    <tr>
                    <td>{{ $val['name'] }}</td>
                    <td>{{ $val['position'] }}</td>
                    <td>{{ $val['office'] }}</td>
                    <td>{{ $val['age'] }}</td>
                    <td>{{ date_format($val['created_at'], 'Y/m/d') }}</td>
                    <td>${{ number_format($val['salary']) }}</td>
                    <td>
                        <a href="{{ route('admin.edit', ['id' => $val['id']]) }}" class="btn btn-outline btn-primary btn-sm" >
                            <i class="fas fa-pencil-alt"> Edit</i>
                        </a>
                        <a href="{{ route('admin.delete', ['id' => $val['id']]) }}" class="btn btn-outline btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"> Delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total Fee</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>${{ number_format(\App\Personnels::sum('salary'), 2) }}</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row" id="fourthRow">
        <div class="col-md-12">
            <h2 style="margin-bottom: 30px; color: darkblue">Sales Report</h2>
            <table id="example2" class="stripe table-borderless" style="width:100%; ">
                <thead style="background-color: #007bff ;color: #dedede">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{ $val['name'] }}</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>asdasd</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

