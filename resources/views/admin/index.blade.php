@extends('layouts.adminMain')
@section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h2>{{ $chart->options['chart_title'] }}</h2>
                    {!! $chart->renderHtml() !!}
                    <hr />
                     <h2>{{ $chart1->options['chart_title'] }}</h2>
                    {!! $chart1->renderHtml() !!}
                    <hr />
                     <h2>{{ $chart2->options['chart_title'] }}</h2>
                    {!! $chart2->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
{!! $chart->renderChartJsLibrary() !!}

{!! $chart->renderJs() !!}

{!! $chart1->renderChartJsLibrary() !!}

{!! $chart1->renderJs() !!}

{!! $chart2->renderChartJsLibrary() !!}

{!! $chart2->renderJs() !!}

@endsection



