<p>Hello,</p>

<p>There is a new Get in Touch enquiry has been submitted by {!! ucwords($name) !!}.</p>

<h3>The detail of the enquiry is as follows.</h3>
<p>
    <strong>Email: </strong> {{ $email }} <br/>
    <strong>Message: </strong> {{ $client_message }}
</p>

<h3>Additional Details</h3>
<p>
    <strong>User IP: </strong> {{ Request::ip() }} <br/>
    <strong>User Buyer: </strong> {{ Request::header("User-Buyer") }} <br/>
</p>
