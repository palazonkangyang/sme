@if (Session::has("alert") && $alert = Session::get("alert"))
    <div class="alert alert-{{ $alert["success"] ? "success" : "danger" }}">
        {{ $alert["message"] }}
    </div>
@endif