<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
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
                body {
            justify-content: center;
        }

        #main {
            background: #ffffff !important; 
            height: auto !important; 
            text-align: left !important; 
            font-family: system-ui, sans-serif !important;
            width: 450px;
            max-width: 450px;
            justify-content: center;
            margin: auto;
            color: #000;
        }

        .custom-qr-image {
            display: flex !important;
            justify-content: center !important;
            margin-bottom: 50px;
        }

        .custom-style-image {
            display: flex !important;
            justify-content: center !important;
            background-color: black;
            border-radius: 6px 6px 0 0;
        }

        .main-h2 {
            color:black !important;
            display: block;
            text-align: center !important;
            font-size: 1rem;
        }

        #main-div, .custom-h4, #custom-p {
            color: #000;
        }

        .custom-a {
            color: #000 !important;
            text-decoration: none;
        }

        .text-center {
            text-align: center;
        }

        .site-color {
            background-image: -webkit-linear-gradient(
                90deg,
                rgb(183, 131, 24) 0%,
                rgb(196, 149, 46) 47%,
                rgb(255, 241, 164) 73%,
                rgb(205, 148, 49) 96%
            );
            background-size: 100%;
            -webkit-background-clip: text;
            -moz-background-clip: text;
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color: transparent;
            font-size: .7rem;
        }

        .main-a {
            padding: 15px;
            text-align: left !important;
        }
        
        .content {
            padding: 15px;
        }

        .footer {
            background-color: black;
            border-radius: 0 0 6px 6px;
        }

        .a-1 {
            margin: 5px 0 0 8px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }

        #a-2 {
            margin-left: 15px;
            font-size: .8rem !important;
            text-decoration: underline !important;
        }

        .custom-font-size {
            font-size: .7rem
        }

        .d-block {
            display: block;
        }

        .d-flex {
            display: flex;
        }

        .mx-3 {
            margin: 0 5px;
        }

        .align-items-center {
            align-items: center;
        }

        .custom-div-text-center {
            text-align: center !important;            
        }

        .rights-reserved {
            text-align: center;
        }

        .m-h6 {
            margin: 10px;
        } 

        .first-d-block {
            border-top: 1px solid #fbeca1;
            padding-top: 3px;
        }

        .image-soldier {
            margin-top: -50px;
        }

        .d-inline {
            display: inline;
        }

        .extra-space {
            margin-bottom: 50px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }
        </style>
    </head>
<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{ $header ?? '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                    <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer ?? '' }}
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
