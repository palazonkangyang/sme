@extends('frontend.layout.main')
@section('content')

    <div class="wrapper">
        <h1>Thank <span>you</span></h1>
        <p class="aligncenter">Thank you! You are now all set for eating experience of LIFETIME!</p>

        <div id="booking" class="no-label">
            <h5><strong>Your Ticket/s Details</strong></h5>
            <label><strong>Tickets review</strong></label>
            <div class="row">
                <div class="col-6"><label>{{ date("d M Y", strtotime($booking->date)) }}</label></div>
                <div class="col-6"><label>Number of Ticket: {{ $booking->ticket_qty }}</label></div>
                


            </div>
            <div class="row">
                <div class="col-6"><label>Discount:
                        ${{ number_format($discount->discount, 2) }}</label>
                </div>
                <div class="col-6"> @foreach($bundle_product as $bundles)
                            
                             <p style="padding-bottom: 10px; margin: 0;">
                                {{$bundles->bundle_qty}} {{ $bundles->name }} </p>
                               
                        @endforeach   
                        </div>                
            </div>
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6"><label>Sub-total: ${{ $booking->getSubTotal() }}
                    </label></div>
            </div>
            <hr>

            

            <label><strong>Passenger’s details</strong></label>
            <div class="row">
                <div class="col-6"><label>First Name: {{ ucwords($booking->first_name) }}</label></div>
                <div class="col-6"><label>Last Name: {{ ucwords($booking->last_name) }}</label></div>
            </div>
            <div class="row">
                <div class="col-6"><label>Contact Number: {{ $booking->contact_no }}</label></div>
                <div class="col-6"><label>Gender: {{ $booking->getGender() }}</label></div>
            </div>
            <div class="row">
                <div class="col-6"><label>Email: {{ $booking->email }}</label></div>
                <div class="col-6"><label>Country: {{ $booking->getCountry->name }}</label></div>
            </div>
            @if ($booking->how_reach_us)
                <div class="row">
                    <div class="col-6"><label>Address: {{ $booking->address }}</label></div>
                    <div class="col-6"><label>How do you find out
                            SME: {{ implode(", ", $booking->getHowReachUs()) }}</label></div>
                </div>
            @endif
            <hr>
            <div class="aligncenter"><br>
                <div><img style="background: white" src="{!! $booking->getBarcodeURL() !!}"
                          alt="{{ $booking->ticket_no }}"></div>
                <label class="aligncenter">Ticket Number: {{ $booking->ticket_no }}</label>
                <input onclick="window.open('{{ route("frontend.ticketing.summery.print", $booking->id) }}')" name="" class="print-button no-print" value="print" type="submit">
            </div>
        </div>
    </div>
@endsection