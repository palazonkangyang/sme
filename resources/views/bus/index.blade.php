<html>
<head>
    <title>Bus Console</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"/>
    <style>
        body {
            font-family: Arial;
            font-size: 13pt;
        }

        #logs {
            font-weight: bold;
            max-width: 460px;
            text-align: center;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            line-height: 1.3;
        }

        #logs small {
            font-weight: normal;
            color: #333;
            font-size: 10pt;
        }
    </style>

    <script type="text/javascript" src="{!! url("plugins/jQuery/jQuery-2.2.0.min.js") !!}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            addLog("Initializing ...");

            var xhr = null;

            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(
                    function (position) {

//                        var dateStart = new Date();
//                        dateStart.setHours(11, 0, 0);
//
//                        var dateEnd = new Date();
//                        dateEnd.setHours(21, 0, 0);
//
//                        var dateNow = new Date();
//
//                        if (dateNow.getTime() > dateStart.getTime() && dateNow.getTime() < dateEnd.getTime()) {
//                            addLog("The tracking of bus only available when 11am- 9pm");
//                        }

                        if (xhr !== null) {
                            xhr.abort();
                            addLog("Request terminated");
                        }

                        xhr = $.ajax({
                            url: "{!! route("bus.updateLocation") !!}",
                            data: position.coords,
                            success: function (res) {
                                xhr = null;
                                addLog("Your location updated on " + position.coords.latitude + "," + position.coords.longitude);
                            },
                            error: function (xhr, ajaxOption, thrownError) {
                                addLog("Error occur: " + thrownError);
                            }
                        });
                    },
                    function (error) {
                        console.log(error);
                        addLog(error.message);
                    }
                );
            } else {
                addLog("Geo location is not supported by this browser.");
            }
        });

        function addLog(message) {
            var date = new Date();
            $("#logs").html("<p>" + message + "<br /><br /><small>At: " + date + "</small></p>");
        }
    </script>
</head>
<body>
<div id="logs"></div>
<a style="float: right" href="{!! route("bus.logout") !!}">Logout</a>
</body>
</html>