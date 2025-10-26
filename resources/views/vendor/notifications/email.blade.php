<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" rel="stylesheet" media="all">
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #181f27; color: #cad1d8;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #181f27;',

    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 18px; font-weight: bold; color: #288afb; text-decoration: none;',

    /* Card-style email body */
    'email-body' => 'width: 100%; margin: 0; padding: 0; background-color: transparent;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px; background-color: #1f2933; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.5);',

    /* Footer */
    'email-footer' => 'width: auto; max-width: 570px; margin: 20px auto 0; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #9aa5b1; padding: 20px; text-align: center; font-size: 12px;',

    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #4d5b69;',

    /* Type ------------------------------ */
    'anchor' => 'color: #288afb; text-decoration: none;',
    'header-1' => 'margin-top: 0; color: #cad1d8; font-size: 20px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #cad1d8; font-size: 16px; line-height: 1.6em;',
    'paragraph-sub' => 'margin-top: 0; color: #9aa5b1; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */
    'button' => 'display: inline-block; width: 220px; min-height: 20px; padding: 12px;
                 background-color: #0967d3; border-radius: 6px; color: #ffffff; font-size: 15px; font-weight: bold;
                 line-height: 25px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none;
                 box-shadow: 0 2px 5px rgba(0,0,0,0.4); border: 1px solid #0550b3;',
    'button--green' => 'background-color: #189a1c; border-color: #0f8513;',
    'button--red' => 'background-color: #d64242; border-color: #841d1d;',
    'button--blue' => 'background-color: #0967d3; border-color: #0550b3;',
];
?>

<?php $fontFamily = 'font-family: Arial, Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="{{ $style['email-masthead'] }}">
                            <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                                {{ config('app.name') }}
                            </a>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">
                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <h1 style="{{ $style['header-1'] }}">
                                            @if (! empty($greeting))
                                                {{ $greeting }}
                                            @else
                                                @if ($level == 'error')
                                                    Whoops!
                                                @else
                                                    Hello!
                                                @endif
                                            @endif
                                        </h1>

                                        @foreach ($introLines as $line)
                                            <p style="{{ $style['paragraph'] }}">
                                                {{ $line }}
                                            </p>
                                        @endforeach

                                        @if (isset($actionText))
                                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td align="center">
                                                        <?php
                                                            switch ($level) {
                                                                case 'success':
                                                                    $actionColor = 'button--green';
                                                                    break;
                                                                case 'error':
                                                                    $actionColor = 'button--red';
                                                                    break;
                                                                default:
                                                                    $actionColor = 'button--blue';
                                                            }
                                                        ?>
                                                        <a href="{{ $actionUrl }}"
                                                            style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                                                            class="button"
                                                            target="_blank">
                                                            {{ $actionText }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif

                                        @foreach ($outroLines as $line)
                                            <p style="{{ $style['paragraph'] }}">
                                                {{ $line }}
                                            </p>
                                        @endforeach

                                        <p style="{{ $style['paragraph'] }}">
                                            Regards,<br>{{ config('app.name') }}
                                        </p>

                                        @if (isset($actionText))
                                            <table style="{{ $style['body_sub'] }}">
                                                <tr>
                                                    <td style="{{ $fontFamily }}">
                                                        <p style="{{ $style['paragraph-sub'] }}">
                                                            If you’re having trouble clicking the "{{ $actionText }}" button,
                                                            copy and paste this URL into your browser:
                                                        </p>

                                                        <p style="{{ $style['paragraph-sub'] }}">
                                                            <a style="{{ $style['anchor'] }}" href="{{ $actionUrl }}" target="_blank">
                                                                {{ $actionUrl }}
                                                            </a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved.
                                        </p>
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
