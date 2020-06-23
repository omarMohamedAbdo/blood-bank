@extends('layouts.hospital')
@section('css')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
<script>
$(function(){
  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'Users Donations',
    type: 'pie',
    radius: '80%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($Data); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];
  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };
  var pie = document.getElementById('chartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});
$(function(){
  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'Hospitals Donations',
    type: 'pie',
    radius: '80%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($HosData); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];
  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };
  var pie = document.getElementById('HoschartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});
</script>

@endsection

    @section('content')
    <!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Home</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
    <section class="contact_area p_120">
        <p class="text-center h4 mb-4">Donations by Users</p>
        @if($Data)
            <div id="chartPie" style="height: 550px;"></div>
        @else
        <p class="text-center h4 mb-4">No donations by users</p>
        @endif
    </section>
    <section class="contact_area p_120">
        <p class="text-center h4 mb-4">Donations by Hospitals</p>
        @if($HosData)
            <div id="HoschartPie" style="height: 550px;"></div>
        @else
        <p class="text-center h4 mb-4">No donations by Hospitals</p>
        @endif
    </section>
    @endsection