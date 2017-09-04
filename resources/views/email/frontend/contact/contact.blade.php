<p>Hello,</p>

<p>There is a new contact enquiry has been submitted by {!! ucwords($first_name . " " . $last_name) !!}.</p>

<h3>The detail of the enquiry is as follows.</h3>
<p>
    <strong>Email: </strong> {{ $email }} <br/>
    <strong>Contact No: </strong> {{ $contact_no }} <br/>
    <strong>Message: </strong> {{ $client_message }}
</p>

<h3>Additional Details</h3>
<p>
    <strong>User IP: </strong> {{ Request::ip() }} <br/>
    <strong>User Buyer: </strong> {{ Request::header("User-Buyer") }} <br/>
</p>





