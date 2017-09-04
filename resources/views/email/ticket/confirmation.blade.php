<div style="font-family: sans-serif; width: 100%; font-size: 10pt; margin: 0 auto;">
    <p style="padding-bottom: 10px; margin: 0;">Dear {{ ucwords($booking->first_name . " " . $booking->last_name) }}
        ,</p>
    <p style="padding-bottom: 10px; margin: 0;">Please be informed that your transaction is confirmed and payment has
        been debited from your account as
        follows:</p>

    <div style="border: 1px solid #ddd;">

        <div style="background-color: #FFFBD5;">
            <h4 style="font-family: 'Times New Roman'; text-transform: uppercase; background-color: #FFF69B; margin: 0; padding: 10px;">
                Booking Details</h4>
            <table style="border-collapse: collapse; width: 100%">
                <tr>
                    <td>
                        <p style="line-height: 1.8; margin: 0; padding: 10px;">
                            Booking Date: {{ date("d-M-Y", strtotime($booking->date)) }}<br>
                            For your reference, your ticket number is: {{ $booking->ticket_no }}
                        </p>
                    </td>

                    <td align="right">
                        <img src="{{ url("frontend/images/logo.png") }}"/>
                    </td>
                </tr>
            </table>
        </div>

        <h1 style="font-family: 'Times New Roman'; font-size: 22pt; text-align: center; text-transform: uppercase; background-color: #FF8C00; margin: 0; padding: 12px;"
            align="center">Ticket Summary</h1>
        <h2 style="font-family: 'Times New Roman'; text-align: center; color: #70AD47; font-size: 18pt; text-transform: uppercase; margin: 0; padding: 20px;"
            align="center">Makan Bus</h2>

        <table style="border-collapse: collapse; width: 100%">
            <tr>
                <td
                        style="font-family: sans-serif; width: 50%; font-size: 10pt; border-top-style: solid; border-top-width: 2px; border-top-color: #FF8C00; vertical-align: top; border-right-width: 2px; border-right-color: #FF8C00; border-right-style: solid; margin: 0 auto; padding: 10px;"
                        valign="top">
                    <h3 style="text-transform: uppercase; font-size: 11pt; padding-bottom: 8px; font-family: 'Times New Roman'; margin: 0;">
                        Ticket Details</h3>
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Date of Tour</strong>:
                        {{ date("d-M-Y", strtotime($booking->date)) }}</p>
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Discount</strong>:
                        @if (isset($discount->discount))
                        S${{ number_format($discount->discount, 2) }}</p>
                        @else
                        S$0.00</p>
                        @endif
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Number of
                            Tickets</strong>:
                        {{ $booking->ticket_qty }}</p>


                           @foreach($bundle_product as $bundles)
                             @if($bundles->bundle_id!=3)
                             <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">{{$bundles->bundle_qty}} {{ $bundles->name }} </strong>: S${{ number_format($bundles->bundle_qty * $bundles->fixed_price,2)}}</p>
                                @else
                                <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">{{$bundles->bundle_qty}} {{ $bundles->name }} </strong>: S${{ number_format($bundles->bundle_qty * $price->fixed_price,2)}}</p>
                                @endif
                        @endforeach   


                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Sub Total: </strong>:
                        S${{ number_format($booking->getSubTotal(), 2) }}</p>

                   

                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Total Amount</strong>:
                        S${{ number_format($booking->getTotalCost(), 2) }}</p>
                </td>
                <td style="font-family: sans-serif; width: 50%; font-size: 10pt; border-top-style: solid; border-top-width: 2px; border-top-color: #FF8C00; vertical-align: top; margin: 0 auto; padding: 10px;"
                    valign="top">
                    <h3 style="text-transform: uppercase; font-size: 11pt; padding-bottom: 8px; font-family: 'Times New Roman'; margin: 0;">
                        Passenger Details</h3>
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">First Name</strong>:
                        {{ ucwords($booking->first_name) }}</p>
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Last Name</strong>:
                        {{ ucwords($booking->last_name) }}
                    </p>

                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Gender</strong>:
                        {{ $booking->getGender() }}
                    </p>

                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Contact No.</strong>:
                        {{ $booking->contact_no }}
                    </p>

                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Email</strong>:
                        {{ $booking->email }}
                    </p>
                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Address</strong>:
                        {{ $booking->address }}
                    </p>

                    <p style="padding-bottom: 10px; margin: 0;"><strong
                                style="display: inline-block; width: 50%; vertical-align: top;">Country</strong>:
                        {{ $booking->getCountry->name }}
                    </p>
                </td>
            </tr>
        </table>

        <div style="padding: 16px 10px; background-color: #FFC945; text-align: center;" align="center">
            <img src="{!! $booking->getBarcodeURL() !!}"
                 style="padding: 10px; background-color: #fff; max-width: 130px;">
            <h2 style="font-family: 'Times New Roman'; text-align: center; color: #E04900; font-size: 14pt; text-transform: uppercase; font-weight: normal; margin: 0; padding: 20px 20px 0;"
                align="center">Your ticket (embedded QR code) to Makan Bus.
                No collection is required.</h2>
        </div>

        <div style="background-color: #DDDDDD; padding-bottom: 10px;">
            <h3 style="font-family: 'Times New Roman'; font-size: 12pt; background-color: #AAAAAA; margin: 0; padding: 10px 16px;">
                Important</h3>
            <p style="margin: 0; padding: 8px 16px;">Please note that all bookings through the internet are confirmed
                bookings and no refunds, exchanges or cancellations will be made in the event of a no show.</p>
            <p style="margin: 0; padding: 8px 16px;">The management reserves the right to change the route without prior
                notice.</p>
            <p style="margin: 0; padding: 8px 16px;">Please note that Food and Beverage items are not permitted to be
                consumed inside the bus.</p>
            <p style="margin: 0; padding: 8px 16px;">Children under the age of 16 must be accompanied by an adult.</p>
            <p style="margin: 0; padding: 8px 16px;">You can collect your customised Makan Bus Maps at our booth at
                orchardgateway, 277 Orchard road, (s) 238858, or on board the buses.</p>
        </div>
    </div>
    <p style="margin: 0; padding: 12px 0;">Thank you for booking your tickets on {!! config("app.url") !!}</p>
</div>

<script>
    window.print();
</script>