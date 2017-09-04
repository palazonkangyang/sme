@extends('frontend.layout.main')
@section('content')
    <div class="wrapper">
        <h1>Ticketing</h1>

        <p class="aligncenter">Please fill in the form below to purchase your Makan Bus tickets. Alternatively, you may
            get the tickets directly from our booth at orchardgateway. For bulk purchase, please email us at
            ticketing@SME.com
        </p>

        <p class="aligncenter">Children under the age of 12 may experience Makan Bus for <strong>free</strong> with accompanying paying adult/s. <br />
            Each child below the age of 12 must be accompanied by <strong>one</strong> paying adult.</p>

        @if($response = Session::get("paymentError"))
            <p class="form-error">{{ $response["message"] }}</p>
        @endif

        {!! Form::open(["url" => route("frontend.ticketing")]) !!}
        <div id="booking" class="no-label">
            <h5><strong>Ticket Purchase</strong></h5>
            <p class="aligncenter"><strong>Tickets are priced at S$<span id="mypricetest" ></span> per ticket</strong></p>
            <p class="aligncenter"><strong><span id="description" ></span> </strong></p>

            <img src="{!! url("frontend/images/SME_logo_h_b.png") !!}"/>
            <label><strong>Tickets</strong></label>

            <div class="row">
               
                    {!! Form::select("bundle", $bundles, NULL, ["id" => "bundle_id"]) !!}
                   
                    {!! $errors->first("date", "<p class='form-error'>:message</p>") !!}
                
            </div>

            <div class="row">
                <div class="col-6">
                    {!! Form::text("date", Input::old("date",Carbon\Carbon::today()->format('d-m-Y')), [ "placeholder" => "Date*", "class" => "datepicker", "autocomplete" => "off" ]) !!}
                    {!! $errors->first("date", "<p class='form-error'>:message</p>") !!}
                </div>
                
                    <input type="hidden" id="myvalue" value="0">
                     <input type="hidden"  id="mybundle" value="0">
                      <input type="hidden" id="mydescription" value="0">
                    <input type="hidden" id="myPrice" value="0">
                    <input type="hidden" id="mypricetesting" value="0">
                     <input type="hidden" id="bundle_id" value="0">
                       <input type="hidden" id="promoo_code" value="">
                        <input type="hidden" name='total_fixed_price' id="total_fixed_price" value="">
                         <input type="hidden" name='total_ticket_qty' id="total_ticket_qty" value="">
                         <div class="col-6">
                    {!! Form::text("ticket_qty", Input::old("ticket_qty"), [ "placeholder" => "Qty*", "id" => "ticket-qty", "autocomplete" => "off" ]) !!}
                    {!! $errors->first("ticket_qty", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    {!! Form::text("promo_code", Input::old("promo_code"), [ "placeholder" => "Promo Code", "id" => "promo_code", "autocomplete" => "off"]) !!}
                    {!! $errors->first("promo_code", "<p class='form-error'>:message</p>") !!}
                    <p class="form-error coupon-error" style="display: none"></p>
                </div>
                <div class="col-6">
                    <label class="total total-ticket">Sub-total - $<span>0.00</span> <span
                                class="discount"></span>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="addRow" value="Add" style="background: #2a2a2a;font: 400 14px/26px 'Lora', serif;padding: 0px 8px;"/>
                                </label>

                </div>
            </div>
            <hr>

        


            <div class="row">
                <div class="col-6"><label><strong>Details</strong></label></div>
                
            </div>
            <div class="row">
               <table id="myTable" style="align:center;" class="col-12">
                    <tr>
                        <td>Type of Bundles</td>
                        <td>Quantity</td>
                        <td>Price per Quantity</td>
                        <td>Discount</td>
                        <td>Total Price</td>
                    </tr>

               </table>
                
            </div>
            <div class="row">
                <div class="col-6">
                    <label style="font-family:Oswald, sans-serif">Total - $<span id="total_fixed">0.00</span></label>
                </div>
            </div>
            <hr>
            <label><strong>Passenger's details</strong></label>
            <div class="row">
                <div class="col-6">
                    {!! Form::text("first_name", NULL, ["placeholder" => "First Name*"]) !!}
                    {!! $errors->first("first_name", "<p class='form-error'>:message</p>") !!}
                </div>
                <div class="col-6">
                    {!! Form::text("last_name", NULL, ["placeholder" => "Last Name*"]) !!}
                    {!! $errors->first("last_name", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    {!! Form::text("contact_no", NULL, ["placeholder" => "Contact No"]) !!}
                    {!! $errors->first("contact_no", "<p class='form-error'>:message</p>") !!}
                </div>
                <div class="col-6">
                    <label>Gender*</label>
                    <div class="row">
                        <div class="col-6">
                            <label class="input">Male
                                {!! Form::radio("gender", 1, Input::old("gender") == 1) !!}
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="input">Female
                                {!! Form::radio("gender", 2, Input::old("gender") == 2) !!}
                            </label>
                        </div>
                    </div>
                    {!! $errors->first("gender", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    {!! Form::email("email", NULL, ["placeholder" => "Email*"]) !!}
                    {!! $errors->first("email", "<p class='form-error'>:message</p>") !!}
                </div>
                <div class="col-6">
                    {!! Form::text("address", NULL, ["class" => "Address", "placeholder" => "Address"]) !!}
                    {!! $errors->first("address", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    {!! Form::select("country", $countries, NULL) !!}
                    {!! $errors->first("country", "<p class='form-error'>:message</p>") !!}
                </div>
                <div class="col-6">
                    <label>How did you find out about makan bus?</label>
                    <label class="input">
                        {!! Form::checkbox("how_reach_us[]", 1, Input::old("how_to_reach_us.0")) !!}
                        Social media sites
                    </label>
                    <label class="input">
                        {!! Form::checkbox("how_reach_us[]", 2, Input::old("how_to_reach_us.1")) !!}
                        Recommended by friends/family
                    </label>
                    <label class="input">
                        {!! Form::checkbox("how_reach_us[]", 3, Input::old("how_to_reach_us.3")) !!}
                        Newspaper
                    </label>
                    <label class="input">
                        {!! Form::checkbox("how_reach_us[]", 4, Input::old("how_to_reach_us.4")) !!}
                        Television
                    </label>
                    <label class="input">
                        {!! Form::checkbox("how_reach_us[]", 5, Input::old("how_to_reach_us.5")) !!}
                        Internet Search
                    </label>


                    {!! $errors->first("how_to_reach_us", "<p class='form-error'>:message</p>") !!}
                </div>
            </div>
            <div class="aligncenter">

                <p style="text-align: left">
                    <label class="input">
                        {!! Form::checkbox("agreement", 1, Input::old("agreement")) !!}
                        I have read and agree to the
                        {!! Config::getPageLink(4, ["target" => "_blank"]) !!}
                        and {!! Config::getPageLink(3, ["target" => "_blank"]) !!}.
                    </label>
                    {!! $errors->first("agreement", "<p class='form-error'>:message</p>") !!}
                </p>
                {!! Form::submit("Buy Now") !!}
                <p class="text-center">Payment by PayPal / Credit Card only.</p>
            </div>
            <div class="disable"></div>
        </div>
        {!! Form::close() !!}
    </div>

    
     <script>
        //edited for Price
        function getTicketCost() {
                       var bundle = $("#bundle_id").val();
                     //console.log(bundle);
                    if(bundle !=3)
                    {
                     var desc = "";               
                     $.ajax({    //create an ajax request to load_page.php
                        type: "GET",
                        url: "ticketing/getJSONbundle",             
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        async: false,   
                        data: { bundle: bundle,
                                desc: desc
                            },               
                        success: function(data){                    
                          
                            $("#msg_2").html(data.msg_2);
                             $("#msg_3").html(data.msg_3);

                             document.getElementById('mypricetesting').value = data.msg_2;  
                             document.getElementById("promo_code").setAttribute("readonly", true);
                            document.getElementById("promo_code").value="";
                        }
                     });
                    }
                    else
                    {
                    var dateMin = $("input.datepicker").val();
                    var parts = dateMin.split("-");
                    var dd= new Date(parts[2], parts[1] - 1, parts[0]);
                    var d = new Date(dd);
                    var day = d.getDay();
                    if(day == '0')
                    {
                    day ='7';
                    }
                    var description = "";
                    document.getElementById('myvalue').value = day;
                    $.ajax({    //create an ajax request to load_page.php
                        type: "GET",
                        url: "ticketing/getJSONprice",             
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        data: { day: day,
                                description: description
                            },  
                        async: false,            
                        success: function(data){                    
                            $("#msg").html(data.msg);
                            $("#msg_1").html(data.msg_1);
                            document.getElementById('myPrice').value = data.msg;
                             document.getElementById('mypricetest').innerHTML = data.msg.substr(0,data.msg.length - 3);
                             document.getElementById('description').innerHTML = data.msg_1;
                             document.getElementById('mypricetesting').value = data.msg.substr(0,data.msg.length - 3);
                             document.getElementById("promo_code").removeAttribute("readonly");

                         }
                     });
                    }
                    return (document.getElementById('mypricetesting').value);
        }
        
        $(document).ready(function(){
            //getTicketCost();
           // $("input.datepicker").formatDate('dd/mm/yy', new Date());
               
               $("#bundle_id").live("change", function () {
                    $(function () {
                         new Ticket();
                          $("input.datepicker").datepicker({
                        format: "dd-mm-yyyy",
                        startDate: new Date(),
                        datesDisabled: [
                            @foreach($setting->ticket_unavailable as $date)
                                    '{!! \Carbon\Carbon::parse($date)->format("d-m-Y") !!}',
                            @endforeach
                        ],
                        autoclose: true
                    });
                     });
                    //console.log(document.getElementById('total_fixed').innerHTML );
                     //getTicketCost();
                     var bundle = ($(this).val());
                     if(bundle != 0)
                     {
                     var desc = "";               
                     $.ajax({    //create an ajax request to load_page.php
                        type: "GET",
                        url: "ticketing/getJSONbundle",             
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        async: false,   
                        data: { bundle: bundle,
                                desc: desc
                            },               
                        success: function(data){                    
                          
                            $("#msg_2").html(data.msg_2);
                             $("#msg_3").html(data.msg_3);
                             document.getElementById('mybundle').value = data.msg_2;      
                             document.getElementById('mydescription').value = data.msg_3;                      
                        }
                     });
                 }
                 if(bundle != 3)
                 {
                    document.getElementById("promo_code").setAttribute("readonly", true);
                    document.getElementById("promo_code").value="";
                 }
                 else
                 {
                  document.getElementById("promo_code").removeAttribute("readonly");
                 }

                       
            });
              var total_ticket_qty = 0;
             var total_fixed_price = 0;
            var array_bundles = new Array();
             $("#addRow").click(function(){
                 array_bundles.push(document.getElementById('bundle_id').value);
                 countInArray(array_bundles, document.getElementById('bundle_id').value);
                 var temporary = document.getElementById('myPrice').value ;function countInArray(array, what) {
                    var count = 0;
                    for (var i = 0; i < array.length; i++) {
                        if (array[i] === what) {
                            count++;
                        }
                    }

                    //alert(count);
                    if(count == 1)
                    {
                        if(document.getElementById('bundle_id').value != 0)
                        {
                                var tmp_1= (0.00).toFixed(2);
                                var tmp_2= 0.00;
                                var bundle_plan_name = document.getElementById('mydescription').value;
                                var bundle = document.getElementById('bundle_id').value;
                                //console.log(bundle);
                                var iddd = document.querySelector('.total-ticket').textContent;
                                
                                document.getElementById('promoo_code').value  = "";
                                if(document.getElementById('promo_code').value != "")
                                    {
                                        tmp_1 = iddd.split('$').pop().split(')').shift();
                                        var tmp = parseFloat(Number(tmp_1) /document.getElementById('ticket-qty').value ).toFixed(2);
                                        var tmp_2= tmp_1;
                                        //console.log(temporary);
                                        document.getElementById('myPrice').value = parseFloat(document.getElementById('myPrice').value - tmp).toFixed(2);
                                        //console.log(tmp_1);
                                        document.getElementById('promoo_code').value  = document.getElementById('promo_code').value;
                                        document.getElementById('promo_code').value = "";
                                        document.getElementById("promo_code").setAttribute("readonly", true);
                                    
                                    }
                                  
                                if(bundle != 3)
                                {
                                    var bundle_plan_price = document.getElementById('mybundle').value;
                                }
                                else
                                {
                                   var bundle_plan_price = document.getElementById('myPrice').value; 
                                }
                                var ticket_qty = document.getElementById('ticket-qty').value;
                                var total_price = parseFloat(bundle_plan_price * ticket_qty).toFixed(2);
                                total_ticket_qty =  (Number(total_ticket_qty) + Number(ticket_qty));
                                total_fixed_price =  (Number(total_price) + Number(total_fixed_price)).toFixed(2);
                                 $('#total_fixed_price').attr('value', total_fixed_price);
                                $('#total_ticket_qty').attr('value', total_ticket_qty);
                                var promoo_code = document.getElementById('promoo_code').value;
                                $("#myTable").append("<tr ><input name='bundle_id[]' value="+bundle +" type='hidden'><input id='bundle_id_id_"+bundle+"' name='bundle_id_id[]' value="+tmp_1 +" type='hidden'><input id='tmp2_"+bundle+"' value="+tmp_2 +" type='hidden'><input name='promo_id[]' value="+promoo_code +" type='hidden'><input id='bundle_qty_"+bundle+"' name='ticket_qty_id[]' value="+ticket_qty +" type='hidden'><input id='bundle_price_"+bundle+"' name='bundle_plan_price_id[]' value="+bundle_plan_price +" type='hidden'><td>" + bundle_plan_name + "</td><td id='ticet_qtys_"+bundle+"' class='ticet_qtys'>" + ticket_qty + "</td><td id='bundle_plan_price_"+bundle+"'>" + bundle_plan_price + "</td><td id='tmp_"+bundle+"''>" + tmp_1 + "</td><td id='total_price_"+bundle+"' class='total_prices'>" + total_price + "</td><td><input type='button' class='delRow' value='remove' style='background: #2a2a2a;font-size: 10px;font-family: serif;font: -webkit-control;padding: 0px 8px;'/></td></tr>");
                                $(".delRow").click(function(){
                                    $(this).parents('tr').remove();
                                   for(var i = array_bundles.length; i--;){
                                        if (array_bundles[i] === bundle) array_bundles.splice(i, 1);
                                    }
                                    //alert(array_bundles);
                                    var sum = 0;
                                    $('#total_fixed_price').attr('value', sum);
                                    $('.total_prices').each(function(){
                                         sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                                    });
                                     
                                     var sum_qty = 0;
                                     $('#total_ticket_qty').attr('value', sum_qty);
                                     $('.ticet_qtys').each(function(){
                                         sum_qty += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                                    });
                                    sum = Number(sum).toFixed(2);
                                    
                                    //$(this).parents('tr').remove();
                                      total_fixed_price = sum;  
                                     $('#total_fixed_price').attr('value', sum);
                                    $('#total_ticket_qty').attr('value', sum_qty);
                                       document.getElementById('total_fixed').innerHTML = sum; 
                                });   
                                document.getElementById('total_fixed').innerHTML = total_fixed_price;
                        }
                        else
                        {
                           alert('Please select Type of Bundle in the Dropdown');
                        }
                    }
                    else
                    {
                        
                        var bundle = document.getElementById('bundle_id').value;
                        var ticket_qty = document.getElementById("bundle_qty_"+bundle+"").value;
                        total_ticket_qty =  (Number(document.getElementById('ticket-qty').value)+ Number(ticket_qty));
                        document.getElementById("bundle_qty_"+bundle+"").value = total_ticket_qty;
                        document.getElementById("ticet_qtys_"+bundle+"").innerHTML = total_ticket_qty;
                        //alert(document.getElementById("ticet_qtys").innerHTML);
                        var bundle_plan_price = document.getElementById("bundle_plan_price_"+bundle+"").innerHTML;
                        //alert(bundle_plan_price);
                       var tmp_2 = document.getElementById("tmp2_"+bundle+"").value;
                      // alert(tmp_2);
                       var total_price_tmp = parseFloat(tmp_2 * total_ticket_qty).toFixed(2);
                       var total_price = parseFloat(bundle_plan_price * total_ticket_qty).toFixed(2);
                       document.getElementById("total_price_"+bundle+"").innerHTML = total_price;
                       document.getElementById("tmp_"+bundle+"").innerHTML = total_price_tmp;
                       document.getElementById("bundle_id_id_"+bundle+"").value = total_price_tmp;
                       var sum = 0;
                                    $('#total_fixed_price').attr('value', sum);
                                    $('.total_prices').each(function(){
                                         sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                                    });
                                     
                                     var sum_qty = 0;
                                     $('#total_ticket_qty').attr('value', sum_qty);
                                     $('.ticet_qtys').each(function(){
                                         sum_qty += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
                                    });
                                    sum = Number(sum).toFixed(2);
                                    
                                    //$(this).parents('tr').remove();
                                      total_fixed_price = sum;  
                                     $('#total_fixed_price').attr('value', sum);
                                    $('#total_ticket_qty').attr('value', sum_qty);
                                       document.getElementById('total_fixed').innerHTML = sum; 
                    }
                    return count;
                }
                
                document.getElementById('myPrice').value  =temporary;
                $(function () {
                       new Ticket();
                });
            });
            
            $("input.datepicker").live("change", function () {
                    $(function () {
                         new Ticket();
                         $("input.datepicker").datepicker({
                            format: "dd-mm-yyyy",
                            startDate: new Date(),
                            datesDisabled: [
                                @foreach($setting->ticket_unavailable as $date)
                                        '{!! \Carbon\Carbon::parse($date)->format("d-m-Y") !!}',
                                @endforeach
                            ],
                            autoclose: true
                        });
                    });
                     //getTicketCost();
                     var dateMin = ($(this).val());
                     var parts = dateMin.split("-");
                     var dd= new Date(parts[2], parts[1] - 1, parts[0]);
                     var d = new Date(dd);
                     var day = d.getDay();
                     if(day == '0')
                    {
                    day ='7';
                    }
                     var description = "";
                     document.getElementById('myvalue').value = day; 
                     if(day == '0')                     
                     {
                        day = '7';
                     }
                     $.ajax({    //create an ajax request to load_page.php
                        type: "GET",
                        url: "ticketing/getJSONprice",             
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        async: false,   
                        data: { day: day,
                                description: description
                            },               
                        success: function(data){                    
                          
                            $("#msg").html(data.msg);
                            $("#msg_1").html(data.msg_1);
                             document.getElementById('myPrice').value = data.msg;
                            document.getElementById('description').innerHTML = data.msg_1;
                             document.getElementById('mypricetest').innerHTML = data.msg.substr(0,data.msg.length - 3);
                             
                             
                            //console.log( data.msg.substr(0,data.msg.length - 3));
                        }

                     });

            });
        });

    $(function () {
                     new Ticket();
                     $("input.datepicker").datepicker({
                        format: "dd-mm-yyyy",
                        startDate: new Date(),
                        datesDisabled: [
                            @foreach($setting->ticket_unavailable as $date)
                                    '{!! \Carbon\Carbon::parse($date)->format("d-m-Y") !!}',
                            @endforeach
                        ],
                        autoclose: true
                    });
                });
    //edited for Price
    /*added for Add Button*/
    
     /*added for Add Button*/
      
    </script>
@endsection