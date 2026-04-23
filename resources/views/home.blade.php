@extends('layouts.app')

@section('content')
	<!-- Dashboard content -->
	<div class="row">
		<div class="col-xl-12">

			<!-- Dashboard -->
			<div class="card">
				<div class="card-header header-elements-sm-inline">
					<h6 class="card-title">{{ configuration('INST_NAME') }}</h6>
				</div>

				<div class="card-body">					

				</div>
			</div>
			
			<div class="card">
				<div class="card-body">
					<table width="100%">
					<tbody> 
					<tr>
					<td align="center">
						<img src="{{ asset('/images/logo-01.png') }}" width="800" height="250">
					</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>

			<!-- Grafik -->
			<!--
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Grafik</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body">
					<div class="chart-container">
						<div class="chart has-fixed-height" id="line_stacked"></div>
					</div>
				</div>
			</div>
			-->
			<!-- /stacked lines -->
		</div>
	</div>
@endsection
@push('scripts')
<script src="{{ asset('/global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
<script>
    var tabelData;
    $(document).ready(function(){
		var line_stacked_element = document.getElementById('line_stacked');
		// Stacked lines chart
        if (line_stacked_element) {

			// Initialize chart
			var line_stacked = echarts.init(line_stacked_element);


			//
			// Chart config
			//

			// Options
			line_stacked.setOption({

				// Global text styles
				textStyle: {
					fontFamily: 'Roboto, Arial, Verdana, sans-serif',
					fontSize: 13
				},

				// Chart animation duration
				animationDuration: 750,

				// Setup grid
				grid: {
					left: 0,
					right: 20,
					top: 35,
					bottom: 0,
					containLabel: true
				},

				// Add legend
				legend: {
					data: ['Internet Explorer', 'Opera', 'Safari', 'Firefox', 'Chrome'],
					itemHeight: 8,
					itemGap: 20
				},

				// Add tooltip
				tooltip: {
					trigger: 'axis',
					backgroundColor: 'rgba(0,0,0,0.75)',
					padding: [10, 15],
					textStyle: {
						fontSize: 13,
						fontFamily: 'Roboto, sans-serif'
					}
				},

				// Horizontal axis
				xAxis: [{
					type: 'category',
					boundaryGap: false,
					data: [
						'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
					],
					axisLabel: {
						color: '#333'
					},
					axisLine: {
						lineStyle: {
							color: '#999'
						}
					},
					splitLine: {
						lineStyle: {
							color: ['#eee']
						}
					}
				}],

				// Vertical axis
				yAxis: [{
					type: 'value',
					axisLabel: {
						color: '#333'
					},
					axisLine: {
						lineStyle: {
							color: '#999'
						}
					},
					splitLine: {
						lineStyle: {
							color: ['#eee']
						}
					},
					splitArea: {
						show: true,
						areaStyle: {
							color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
						}
					}
				}],

				// Add series
				series: [
					{
						name: 'Internet Explorer',
						type: 'line',
						stack: 'Total',
						smooth: true,
						symbolSize: 7,
						data: [120, 132, 101, 134, 90, 230, 210],
						itemStyle: {
							normal: {
								borderWidth: 2
							}
						}
					},
					{
						name: 'Opera',
						type: 'line',
						stack: 'Total',
						smooth: true,
						symbolSize: 7,
						data: [220, 182, 191, 234, 290, 330, 310],
						itemStyle: {
							normal: {
								borderWidth: 2
							}
						}
					},
					{
						name: 'Safari',
						type: 'line',
						stack: 'Total',
						smooth: true,
						symbolSize: 7,
						data: [150, 232, 201, 154, 190, 330, 410],
						itemStyle: {
							normal: {
								borderWidth: 2
							}
						}
					},
					{
						name: 'Firefox',
						type: 'line',
						stack: 'Total',
						smooth: true,
						symbolSize: 7,
						data: [320, 332, 301, 334, 390, 330, 320],
						itemStyle: {
							normal: {
								borderWidth: 2
							}
						}
					},
					{
						name: 'Chrome',
						type: 'line',
						stack: 'Total',
						smooth: true,
						symbolSize: 7,
						data: [820, 932, 901, 934, 1290, 1330, 1320],
						itemStyle: {
							normal: {
								borderWidth: 2
							}
						}
					}
				]
			});
		}

	});
</script>
@endpush
