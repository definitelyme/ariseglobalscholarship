<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tr>
            <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                    <tr>
                        <td class="header" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 25px 0; text-align: center;">
                            <a href="{{ route('/') }}" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #bbbfc3; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 #ffffff;">
                                {{ $subject ?? config('app.name') }}
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #edeff2; border-top: 1px solid #edeff2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        <h4 style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #2F3133; font-size: 18px; font-weight: normal; margin-top: 0; text-align: left;">Hi {{ $user->first_name }},</h4>

                                        <table class="panel" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 0 40px;">
                                            <tr>
                                                <td class="panel-content" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #eee; padding: 16px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                        <tr>
                                                            <td class="panel-item" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 0;">
                                                                <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left; margin-bottom: 0; padding-bottom: 0;">
                                                                    {{ $body }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; font-size: 15px; text-align: left;">
                                            Listed below is the details of the transaction:<br>
                                        </p>

                                        <div class="table" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                            <table style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 10px auto; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                                <thead style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    <tr>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">Program</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">Amount</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px;">Transaction ID</th>
                                                        <th style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; border-bottom: 1px solid #edeff2; padding-bottom: 8px; text-align: right;">Transaction Reference</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    <tr>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;">{{ $scholarship->version }}</td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;">
                                                            {{ $receipt->currency }} {{ $receipt->amount }}
                                                        </td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0;">
                                                            {{ $receipt->transaction_id }}
                                                        </td>
                                                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 15px; line-height: 18px; padding: 10px 0; text-align: right;">
                                                            {{ $receipt->transaction_reference }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <table class="promotion" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border: 2px dashed #003e90; margin: 0; margin-bottom: 25px; margin-top: 25px; padding: 24px; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                                            <tr>
                                                <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; line-height: 1.5em; margin-top: 0; font-size: 15px; text-align: center;">E-PIN:
                                                        <strong style="color: #ec3237">
                                                            {{ $receipt->pin }}
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787e; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Thanks,<br>
                                            {{ config('app.name') }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #aeaeae; font-size: 12px; text-align: center;">© 2021 {{ config('app.name') }}. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
