@extends('buyer.layouts.main')
@section('content')

	<div class="small-breadcrumb">

        <div class="container">

            <div class=" breadcrumb-link">
               	<ul>
                  	<li><a href="{{ route('buyer.index') }}">Home</a></li>
                 	<li><a class="active" href="#">Districts</a></li>
               	</ul>
            </div><!-- end breadcrumb-link -->

        </div><!-- end container -->

    </div><!-- end small-breadcrumb -->

    <div class="main-content-area clearfix">

    	<section class="section-padding pattern_dots">

    		<div class="container">

    			<div class="row">
    				
    				<section class="ads-location">

    					<div class="container">

    						<div class="row">

    							<div class="heading-panel">
                    
                  				</div><!-- end heading-panel -->

                  				<div class="col-md-12 col-xs-12 col-sm-12 no-padding">

                  					<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[0]['id']]) }}">Raffles Place<br />
	                              				Marina<br />
	                              				Cecil</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[0]['id']]) }}">{{ $districts[0]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[1]['id']]) }}">Tanjong Pagar<br />
	                              				Chinatown<br />
	                              				&nbsp;</h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[1]['id']]) }}">{{ $districts[1]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[2]['id']]) }}">Boon Lay<br />
	                              				Jurong<br />
	                              				Tuas</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[2]['id']]) }}">{{ $districts[2]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[3]['id']]) }}">Choa Chu Kang<br />
	                              				Bukit Panjang<br />
	                              				Bukit Batok</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[3]['id']]) }}">{{ $districts[3]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[4]['id']]) }}">Tampines<br />
	                              				Pasir Ris<br />
	                              				&nbsp;</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[4]['id']]) }}">{{ $districts[4]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[5]['id']]) }}">Bedok<br />
	                              				Upper East Coast<br />
	                              				Siglap</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[5]['id']]) }}">{{ $districts[5]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[6]['id']]) }}">Novena<br />
	                              				Newton<br />
	                              				Thomson</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[6]['id']]) }}">{{ $districts[6]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[7]['id']]) }}">Clarke Quay<br />
	                              				City Hall<br />
	                              				&nbsp;</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[7]['id']]) }}">{{ $districts[7]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[8]['id']]) }}">Toa Payoh<br />
	                              				Serangoon<br />
	                              				Balestier</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[8]['id']]) }}">{{ $districts[8]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[9]['id']]) }}">Bugis<br />
	                              				Beach Road<br />
	                              				Golden Mile</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[9]['id']]) }}">{{ $districts[9]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[10]['id']]) }}">Buona Vista<br />
	                              				Pasir Panjang<br />
	                              				Clementi</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[10]['id']]) }}">{{ $districts[10]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[11]['id']]) }}">Geylang<br />
	                              				Paya Lebar<br />
	                              				Sims</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[11]['id']]) }}">{{ $districts[11]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                     				<div class="col-md-3 col-sm-4 col-xs-12">
                        
                        				<div class="ad-location-gird clearfix">
                           					<div class="location-icon"> 
                           						<i class="fa fa-map-marker"></i> 
                           					</div><!-- end location-icon -->
                           					
                           					<div class="location-title-disc">
	                              				<h5><a href="{{ route('buyer.districtsbyid', [$districts[12]['id']]) }}">Orchard Road<br />
	                              				River Valley</a></h5>
	                              				<a class="number-adds" href="{{ route('buyer.districtsbyid', [$districts[12]['id']]) }}">{{ $districts[12]["count"] }} ads available</a> 
                           					</div><!-- end location-title-disc -->

                        				</div><!-- end ad-location-grid clearfix -->

                     				</div><!-- end col-md-3 col-sm-4 col-xs-12 -->

                  				</div><!-- end col-md-12 col-xs-12 col-sm-12 no-padding -->

    						</div><!-- end row -->

    					</div><!-- end container -->

    				</section><!-- end ads-location -->

    				<section class="about-us">

			            <div class="container-fluid">
			            
			            </div><!-- end container-fluid -->

         			</section><!-- end about-us -->

    			</div><!-- end row -->

    		</div><!-- end container -->

    	</section><!-- end section-padding pattern_dots -->

    	<div class="clearfix"></div><!-- end clearfix -->

    </div><!-- end main-content-are clearfix -->
     
@endsection