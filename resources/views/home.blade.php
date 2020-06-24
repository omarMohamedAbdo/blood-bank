@extends('layouts.donor')

@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
<script>
$(function(){
  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'My Donations',
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
</script>

@endsection
@section('content')

     <!--================ Home Banner Area =================-->
<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<img class="img-fluid" src="{{asset('css/img/banner/text-img.png')}}" alt="">
						<p>Please Help Us, Donate Now to our causes</p>
						<a class="main_btn mr-10" href="{{ route('campaigns') }}">donate now</a>
						<a class="white_bg_btn" href="#pieChart">view activity</a>
					</div>
				</div>
			</div>
		</div>
</section>
<!--================ End Home Banner Area =================-->
<!-- @if(isset($Data))
	<div id="chartPie" style="height: 550px;"></div>
@else
<p class="text-center h4 mb-4">You have no Donations yet</p>
@endif -->
<br>
<br>
<section class="blog_area single-post-area ">
  <div class="container">
      <div class="row justify-content-center section-title-wrap">
          <div class="col-lg-8 posts-list">
              <div class="single-post row">
                <div class="col-lg-12">
                  <h1>Just 1 donation can save up to 3 lives</h1>
                  <div class="quotes">
                      Blood from one donation can be divided into two components: red blood cells and plasma.
                      The average adult has about 10 pints of blood, but a typical whole-blood donation is only 1 pint.
                      Red blood cells have a short shelf life. They only last for 6 weeks (42 days).
                      Donating whole blood takes only about 10-15 minutes.
                      You can donate whole blood every 56 days—and we encourage you to donate as often as possible.
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                        <img class="img-fluid" src="{{asset('Heart-Article-Hero-1200x500.gif')}}" alt="">
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-lg-8 posts-list">
              <div class="single-post row">
                <div class="col-lg-12">
                  <div class="quotes">
                    Someone needs blood every two seconds.
                    About 1 in 7 people entering a hospital need blood.
                    Children being treated for cancer, premature infants and children having 
                    heart surgery need blood and platelets from donors of all types, especially type O.
                    Cancer, transplant and trauma patients, and patients undergoing open-heart surgery 
                    may require platelet transfusions to survive.
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <img class="img-fluid" src="{{asset('EBA_1_patient_care.gif')}}" alt="">
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</section>
<hr>
<section class="contact_area p_120" id="pieChart"> 
	<p class="text-center h4 mb-4">My Donations</p>
	@if($Data)
		<div id="chartPie" style="height: 550px;"></div>
	@else
	<p class="text-center h4 mb-4">You have no Donations yet</p>
	@endif
</section>
@endsection
