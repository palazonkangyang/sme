@extends('buyer.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-5 col-lg-offset-3">
            {!! Form::open(["route" => "buyer.collection.product.verification.view"]) !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ticket Information</h3>
                </div>

                <div class="box-body">
                    <div class="form-group{!! $errors->has("ticket_no") ? " has-error" : "" !!}">
                        {!! Form::label("Ticket No") !!}
                        {!! Form::text("ticket_no", Input::old("ticket_no"), ["class" => "form-control"]) !!}
                        <p class="help-block">{{ $errors->first("ticket_no") }}</p>
                        <input type="hidden"  name="ticket_idd" id="ticket_idd" value="0">
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit("Submit", [ "class" => "btn btn-primary" ]) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
<script type="text/javascript">
    $("input.form-control").on("change", function () {
        var ticket_number = ($(this).val());
        console.log(ticket_number);
         $.ajax({    //create an ajax request to load_page.php
                        type: "GET",
                        url: "verification/getTicketid",             
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        async: false,   
                        data: { ticket_number: ticket_number,
                                
                            },               
                        success: function(data){                    
                          
                            $("#msg").html(data.msg);
                           
                             document.getElementById('ticket_idd').value = data.msg;
                           
                            //console.log( data.msg.substr(0,data.msg.length - 3));
                        }

                     });
    });
</script>

@endsection