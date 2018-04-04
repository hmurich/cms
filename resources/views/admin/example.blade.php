@extends('admin.layout')

@section('title', 'sample title')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title get-new_data">Bordered Table</h3>
            </div>
            <div class="box-body">
                <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title get-new_data">Bordered Table 2</h3>
            </div>
            <div class="box-body">
                <div id="container_2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css_block')
<style>
.highcharts-credits{
    color: transparent !important;
    fill: transparent !important;
}
</style>
@endsection


@section('js_block')
    <script src="/admin/hichart/code/highcharts.js"></script>
    <script src="/admin/hichart/code/modules/exporting.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var hichar_config_2 = {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    '2016',
                    '2017'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'МВД 1',
                data: [23.9, 48.5]

            }, {
                name: 'МВД 2',
                data: [10.9, 45.5]

            }, {
                name: 'МВД 3',
                data: [12.9, 25.5]

            }, {
                name: 'МВД 4',
                data: [65.9, 20.5]

            }, {
                name: 'МВД 5',
                data: [48.9, 23.5]

            }, {
                name: 'МВД 6',
                data: [43.9, 1.5]

            }]
        }

        Highcharts.chart('container_2', hichar_config_2);

        $('.get-new_data').click(function(){
            $.post( "/adminka/rand-data") .done(function( data ) {
                var data_set = [];
                $.each(data.data, function( index, value ) {

                    data_set.push({
                        name: index,
                        y: value,
                        id: index
                    });
                });

                var hichar_config = {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie',
                        events: {
                                click: function (event) {
                                console.log(event);
                            },
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    title: {
                       text: ''
                   },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Кол-во',
                        colorByPoint: true,
                        data: data_set,
                        point: {
                            events: {
                                click: function () {
                                    console.log('id: ' + this.id + ', value: ' + this.y);
                                }
                            }
                        }
                    }]
                };

                var chart = new Highcharts.Chart('container', hichar_config);
            });
        });
	</script>
@endsection
