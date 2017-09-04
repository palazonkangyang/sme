@extends('buyer.layouts.main')
@section('content')
	<div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{ route("buyer.index") }}">Home</a></li>
                 <li><a class="active" href="#">How It Works</a></li>
               </ul>
            </div>
         </div>
      </div>
     
      <!-- =-=-=-=-=-=-= Advance Search End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
     <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <div class="step-to">
			<div class="container">
				<h1>Easiest Way To Use</h1>
				<p>
					At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas mo
				</p>
	
				<div class="step-spacer"></div>
				<div id="step-image">
					<div class="step-by-container">
						<div class="step-by">
							First Step
							<div class="step-by-inner">
								<div class="step-by-inner-img">
									<img style="height:80px;" src="{{ url("/adforest/images/steps/1.png") }}" alt="step 1" />
                                                                    
								</div>
							</div>
							<h5>Register with us</h5>
						</div>
								
						<div class="step-by">
							Second Step
							<div class="step-by-inner">
								<div class="step-by-inner-img">
									<img style="height:80px;" src="{{ url("/adforest/images/steps/2.png") }}" alt="step 2" />
								</div>
							</div>
							<h5>Subscribe a plan </h5>
						</div>
								
						<div class="step-by">
							Third Step
							<div class="step-by-inner">
								<div class="step-by-inner-img">
									<img style="height:80px;" src="{{ url("/adforest/images/steps/3.png") }}" alt="step 3" />
								</div>
							</div>
							<h5>Upload your ads </h5>
						</div>
								
						<div class="step-by">
							Lastly
							<div class="step-by-inner">
								<div class="step-by-inner-img">
								<img style="height:80px;" src="{{ url("/adforest/images/steps/4.png") }}" alt="step 4" />
								</div>
							</div>
							<h5>Rest & get leads</h5>
						</div>
								
					</div>
				</div>
				<div class="step-spacer"></div>
			</div>
		</div>
         <div class="clearfix"></div>
   
@endsection