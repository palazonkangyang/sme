<img src="{{ url("frontend/images/logo.png") }}"/>
<div style="border: 1px solid #ddd; padding: 10px">
    <h2 style="text-align: center; color: #0B8A4A; text-decoration: underline">Supplier Account Created</h2>

    <p>Hello {!! $supplier->contact_person !!},</p>

    <p>Thank you for creating an account with {!! Config::SITE_NAME !!}. We look forward to seeing your activities
        offered to
        our community of travellers.</p>
    <p>You may begin using supplier account by clicking on <a href="{!! Route("supplier.auth.login") !!}">this link</a> and
        the
        credentials provided bellow.</p>

    <p>
    <h3>Your Account</h3>
    <strong>Email: </strong> {{ Input::get("email") }}<br/>
    <strong>Password: </strong> {{ Input::get("password") }}
    </p>

    <p style="text-align: center;">
        Questions?<br/>
        Call us: {{ Config::SITE_PHONE }} | Email us: {{ Config::VENDOR_EMAIL }}
    </p>
</div>