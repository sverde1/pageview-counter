@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PageViewLog stats') }}</div>

                <div class="card-body">
                    <h4>Monthly views</h4>

                    <table border="1">
                        <tr>
                            <td>Year and Month</td>
                            <td>All user views</td>
                            <td>Guest user views</td>
                            <td>Authorized user views</td>
                        </tr>
                        @foreach ($monthlyLogViewCount as $monthlyCount)
                            <tr>
                                <td>{{$monthlyCount->year}}-{{$monthlyCount->month}}</td>
                                <td>{{$monthlyCount->total_count}}</td>
                                <td>{{$monthlyCount->guest_count}}</td>
                                <td>{{$monthlyCount->authorized_count}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <br />


                    <h4>Daily views</h4>

                    <table border="1">
                        <tr>
                            <td>Year, Month and day</td>
                            <td>All user views</td>
                            <td>Guest user views</td>
                            <td>Authorized user views</td>
                        </tr>
                        @foreach ($dailyLogViewCount as $dailyCount)
                            <tr>
                                <td>{{$dailyCount->year}}-{{$dailyCount->month}}-{{$dailyCount->day}}</td>
                                <td>{{$dailyCount->total_count}}</td>
                                <td>{{$dailyCount->guest_count}}</td>
                                <td>{{$dailyCount->authorized_count}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
