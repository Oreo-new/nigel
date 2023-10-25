<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Take Back Manufacturing</title>
	</head>
    <body>


        <div style="display: flex; height: 100%; background: #f4f4f4;">
            <div style="width: 76%; margin: auto; background: #ffff; padding: 26px; border: 2px solid #c10000; border-radius: 13px;">
                <div style="text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 14px;">
                    <h1 style="margin-top: 10px; color: #c10000;">
                        Take Back Manufacturing
                    </h1>
                </div>

                <div style="text-align: center;">
                    <h2>Sent from Take Back Manufacturing contact form</h2>
                </div>

                <div style="font-size: 18px;">
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">Name:</span> {{ $contact['name'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">E-mail:</span> {{ $contact['company'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">E-mail:</span> {{ $contact['address'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">E-mail:</span> {{ $contact['email'] }} </div>
                    <div style="padding-bottom: 8px;"><span style="padding-left: 13px; font-weight: 600;">Message:</span></div>
                    <p style="padding: 0 7%;"> {{ $contact['message'] }} </p>
                </div>
            </div>
        </div>


    </body>
</html>