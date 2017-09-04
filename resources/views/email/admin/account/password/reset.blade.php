<p>Hello {{ $user->first_name }},</p>

<p>You recently requested to reset your password for {!! $user->getRole() !!} account on {!! Config::SITE_NAME !!}.
    Click on this link to <a href="{{ route('admin.account.password.reset', array($type, $token)) }}">Reset password</a>
</p>
<p>If you did not request a password reset, Please ignore this email and your password remain the same.</p>

<p>&nbsp;</p>
<p>Thanks <br/>
    {!! Config::SITE_NAME !!}
</p>