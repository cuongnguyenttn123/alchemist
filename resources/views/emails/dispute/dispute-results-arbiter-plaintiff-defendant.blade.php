<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice</title>
    <style type="text/css">
        a {
            text-decoration: none;
            outline: none;
        }

        @media (max-width: 649px) {
            .o_col-full {
                max-width: 100% !important;
            }

            .o_col-half {
                max-width: 50% !important;
            }

            .o_hide-lg {
                display: inline-block !important;
                font-size: inherit !important;
                max-height: none !important;
                line-height: inherit !important;
                overflow: visible !important;
                width: auto !important;
                visibility: visible !important;
            }

            .o_hide-xs,
            .o_hide-xs.o_col_i {
                display: none !important;
                font-size: 0 !important;
                max-height: 0 !important;
                width: 0 !important;
                line-height: 0 !important;
                overflow: hidden !important;
                visibility: hidden !important;
                height: 0 !important;
            }

            .o_xs-center {
                text-align: center !important;
            }

            .o_xs-left {
                text-align: left !important;
            }

            .o_xs-right {
                text-align: left !important;
            }

            table.o_xs-left {
                margin-left: 0 !important;
                margin-right: auto !important;
                float: none !important;
            }

            table.o_xs-right {
                margin-left: auto !important;
                margin-right: 0 !important;
                float: none !important;
            }

            table.o_xs-center {
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }

            h1.o_heading {
                font-size: 32px !important;
                line-height: 41px !important;
            }

            h2.o_heading {
                font-size: 26px !important;
                line-height: 37px !important;
            }

            h3.o_heading {
                font-size: 20px !important;
                line-height: 30px !important;
            }

            .o_xs-py-md {
                padding-top: 24px !important;
                padding-bottom: 24px !important;
            }

            .o_xs-pt-xs {
                padding-top: 8px !important;
            }

            .o_xs-pb-xs {
                padding-bottom: 8px !important;
            }
        }

        @media screen {
            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 400;
                src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 400;
                src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2) format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 700;
                src: local("Roboto Bold"), local("Roboto-Bold"), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2) format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            @font-face {
                font-family: 'Roboto';
                font-style: normal;
                font-weight: 700;
                src: local("Roboto Bold"), local("Roboto-Bold"), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfBBc4.woff2) format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            .o_sans,
            .o_heading {
                font-family: "Roboto", sans-serif !important;
            }

            .o_heading,
            strong,
            b {
                font-weight: 700 !important;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
            }
        }
    </style>
    <!--[if mso]>
    <style>
      table { border-collapse: collapse; }
      .o_col { float: left; }
    </style>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
</head>

<body class="o_body o_bg-light"
    style="width: 100%;margin: 0px;padding: 0px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;background-color: #dbe5ea;">
    <!-- preview-text -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_hide" align="center"
                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">
                    Email Summary (Hidden)</td>
            </tr>
        </tbody>
    </table>

    @include('emails.shared.header')

    <!-- header-primary-button -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white"
                                    align="center"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #FF0303;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_sans o_text o_text-white o_b-white o_px o_py o_br-max"
                                                    align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;border: 2px solid #ffffff;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <img src="{{ asset('public/assets/images/email/site/briefcase-48-white.png') }}"
                                                        width="96" height="96" alt=""
                                                        style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="o_heading o_mb-xxs"
                                        style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">
                                        Dispute Results</h2>
                                    <p style="margin-top: 0px;margin-bottom: 20px;">Hi
                                        <span>{{ $user->full_name }}</span>, please find
                                        all the arbiter results and case details for Dispute ID: #{{ $dispute->id }}
                                    </p>
                                    <table align="center" cellspacing="0" cellpadding="0" border="0"
                                        role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="300" class="o_btn o_bg-white o_br o_heading o_text"
                                                    align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #242B3D;border-radius: 4px;">
                                                    <a class="o_text-primary"
                                                        href="{{ route('dispute.single', ['id' => $dispute->id]) }}"
                                                        style="text-decoration: none;outline: none;color: #FFFFFF;display: block;padding: 12px 24px;mso-text-raise: 3px;">Results
                                                        Panel &nbsp;→</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <!-- hero-white -->
    <!-- invoice-details -->
    <!-- spacer -->
    <!-- invoice_header -->

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>


                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-size: 0;vertical-align: top;background-color: #ebf5fa;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class=" o_text o_text-secondary "
                                        style="display: inline-block;vertical-align: top;width: 100%;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text o_text-secondary o_left "
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 18px;line-height: 24px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text o_text-secondary"
                                                style="margin-top: 0px;margin-bottom: 4px;">
                                                <span><strong>Dispute ID: #{{ $dispute->id }}</strong></span> </p>
                                            <p
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 0px;">
                                                <strong>Plaintiff's Dispute Reason: </strong></p>
                                            <p
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 5px;">
                                                {{ $dispute->description }}</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_sans o_text-xs o_text-light o_px-md o_pt-xs" align="center"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 8px;">
                                    <p style="margin-top: 0px;margin-bottom: 0px;">Arbiter Results |
                                        {{ $dispute->is_to_win() ? 'Defendant' : 'Plaintiff' }} Wins</p>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_re o_bb-light"
                                                    style="font-size: 8px;line-height: 8px;height: 8px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                    &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-white o_px o_pt-xs o_hide-xs" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-top: 8px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="400" align="left" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-4"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                        <div class="o_px-xs o_sans o_text-xs o_left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Arbiters</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_center"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Plaintiff</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_right"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Defendant</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                            role="presentation">
                                            <tbody>
                                                <tr>
                                                    <td class="o_re o_bb-light"
                                                        style="font-size: 9px;line-height: 9px;height: 9px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                        &nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    @foreach($arbiters as $arbiter)
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-white o_px o_pt" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-top: 16px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="400" align="left" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-4 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                        <div class="o_px-xs o_sans o_text-xs o_left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text o_text-secondary"
                                                style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 0px;">
                                                @if($arbiter->is_win)
                                                <strong class="o_text-dark" style="color: #88C000;">Won</strong>
                                                @else
                                                <strong class="o_text-dark" style="color: #C00000;">Lost</strong>
                                                @endif
                                                <strong> | Arbiter {{ sprintf('%02d', $loop->index + 1) }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text o_center o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-secondary"
                                                style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                                                    class="o_hide-lg"
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Plaintiff
                                                    Vote:&nbsp;
                                                    @if(!$arbiter->vote)
                                                </span><span style="color: #80AF00">✔</span>
                                                @else
                                                </span><span style="color: #C00000">✘</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text o_right o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-secondary"
                                                style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                                                    class="o_hide-lg"
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Defendant
                                                    Vote:&nbsp; </span>
                                                @if($arbiter->vote)
                                                </span><span style="color: #80AF00">✔</span>
                                                @else
                                                </span><span style="color: #C00000">✘</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                            role="presentation">
                                            <tbody>
                                                <tr>
                                                    <td class="o_re o_bb-light"
                                                        style="font-size: 16px;line-height: 16px;height: 16px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                        &nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-white o_px o_pb-md" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->

                                    <div class="o_col o_col-3 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text-xs o_text-secondary o_left o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Project Details</strong>
                                            </p>
                                            <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">
                                                <strong>Project ID:</strong> #{{ $dispute->project->id }}<br>
                                                <strong>Total Price:</strong> $2300[TODO] USD<br>
                                                <strong>Delivery Date:</strong> 14:05 12/12/2019[TODO]<br>
                                                <strong>Project Timeline:</strong> 120 Days[TODO]<br>
                                                <strong>Total Milestones:</strong>
                                                {{ $dispute->project->milestone->count() }} Milestones<br>
                                            </p>
                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Project Category &
                                                    Skills</strong></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Category:</strong>
                                                {{ $dispute->project->categories->implode('name', ' / ') }}</p>
                                            <p style="margin-top: 0px;margin-bottom: 24px;">
                                                <strong>Skills:</strong>{{ $dispute->project->skills->implode('name', ', ') }}
                                            </p>

                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Dispute
                                                    Information</strong></p>
                                            <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">
                                                <strong>Dispute ID:</strong>
                                                #{{ $dispute->id }}<br>
                                                <strong>Dispute Requested:</strong>
                                                {{ $dispute->created_at->format('H:i j/n/Y') }}<br>
                                                <strong>Dispute Accepted:</strong> 14:05 12/12/2019[TODO]<br>
                                                <strong>Arbiters Accepted Invite: </strong>12/22/2019[TODO]<br>
                                                <strong>Disputed Milestone: </strong>01 | 20%[TODO]<br>
                                                <strong>Disputed Amount: </strong>$300 USD[TODO]<br>
                                                <strong>Plaintiff/Defendant Stake: </strong>600 Craft Credits[TODO]<br>
                                            </p>
                                        </div>
                                    </div>



                                    <div class="o_col o_col-3 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text-xs o_text-secondary o_left o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Alchemist
                                                    Gain:[TODO]</strong></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">1/5 Votes (20%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Gain
                                                <span><strong>$60&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">2/5 Votes (40%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Gain
                                                <span><strong>$120&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">3/5 Votes (60%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Gain
                                                <span><strong>$180&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;color: #86AC00">4/5 Votes
                                                (80%)&nbsp; &nbsp; &nbsp;
                                                &nbsp;= Gain <span><strong>$240&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">5/5 Votes (100%)&nbsp; &nbsp;
                                                &nbsp;= Gain
                                                <strong>$300&nbsp;USD</strong></span></p>

                                            <p style="margin-top: 0px;margin-bottom: 5px;">--------------------</p>

                                            <p style="margin-top: 0px;margin-bottom: 24px;">Credits Returned&nbsp;
                                                &nbsp; &nbsp; = <span>15
                                                </span>Credits</p>
                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Seeker
                                                    Payout:[TODO]</strong></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">0/5 Votes (0%)&nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp;=
                                                Pay <span><strong>$300 USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;color: #C00000">1/5 Votes
                                                (20%)&nbsp; &nbsp; &nbsp;
                                                &nbsp;= Pay <span><strong>$240&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">2/5 Votes (40%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Pay
                                                <span><strong>$180&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">3/5 Votes (60%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Pay
                                                <span><strong>$120&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 0px;">4/5 Votes (80%)&nbsp; &nbsp;
                                                &nbsp; &nbsp;= Pay
                                                <span><strong>$60&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 5px;">5/5 Votes (100%)&nbsp; &nbsp;
                                                &nbsp;= Pay
                                                <span><strong>$0&nbsp;USD</strong></span></p>
                                            <p style="margin-top: 0px;margin-bottom: 5px;">--------------------</p>

                                            <p style="margin-top: 0px;margin-bottom: 24px;">Credits Returned&nbsp;
                                                &nbsp; &nbsp; = <span>0
                                                </span>Credits</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="left" valign="top" style="padding: 0px 8px;"><![endif]-->

                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_sans o_text-xs o_text-light o_px-md o_pt-xs" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #FFFFFF;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 8px;">
                                    <p style="margin-top: 0px;margin-bottom: 0px;">FULL PROJECT DESCRIPTION</p>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_re o_bb-light"
                                                    style="font-size: 8px;line-height: 8px;height: 8px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                    &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>


                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-size: 0;vertical-align: top;background-color: #FFFFFF;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class=" o_text o_text-secondary "
                                        style="display: inline-block;vertical-align: top;width: 100%;">
                                        <div style="font-size: 24px; line-height: 10px; height: 10px;"> </div>
                                        <div class="o_px-xs o_sans o_text o_text-secondary o_left "
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text o_text-secondary"
                                                style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 10px;margin-bottom: 5px;font-weight: 600">
                                                {{ $dispute->project->name }}</p>
                                            <p class="o_mb-xs"
                                                style="margin-top: 0px;margin-bottom: 5px; font-size: 14px">
                                                {{ $dispute->project->short_description }} </p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_sans o_text-xs o_text-light o_px-md o_pt-xs" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 8px;">
                                    <p style="margin-top: 0px;margin-bottom: 0px;">DISPUTED MILESTONE</p>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_re o_bb-light"
                                                    style="font-size: 8px;line-height: 8px;height: 8px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                    &nbsp; </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-white o_px o_pt-xs o_hide-xs" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-top: 8px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="400" align="left" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-4"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                        <div class="o_px-xs o_sans o_text-xs o_left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Milestone</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_center"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Days</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_right"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: right;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Price</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                            role="presentation">
                                            <tbody>
                                                <tr>
                                                    <td class="o_re o_bb-light"
                                                        style="font-size: 9px;line-height: 9px;height: 9px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                        &nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-white o_px o_pt" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-top: 16px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="400" align="left" valign="top" style="padding: 0px 8px;"><![endif]-->


                                    <div class="o_col o_col-4 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 400px;">
                                        <div class="o_px-xs o_sans o_text-xs o_left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text o_text-secondary"
                                                style="font-size: 16px;line-height: 24px;color: #828282;margin-top: 0px;margin-bottom: 5px;">
                                                Milestone | 01[|TODO] </p>
                                            <p class="o_text o_text-secondary"
                                                style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                                <strong>{{ $dispute->milestone->title }}</strong></p>
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 5px;">
                                                {{ $dispute->milestone->description }}</p>

                                            <p class="o_text-primary"
                                                style="color: #8289A0;margin-top: 0px;margin-bottom: 10px;">
                                                <em><strong>Milestone Due:</strong> 12th December 2019[TODO]</em></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text o_center o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-secondary"
                                                style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                                                    class="o_hide-lg"
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Days
                                                    Progress:&nbsp; </span>50/50[TODO]</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text o_right o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: right;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-secondary"
                                                style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                                                    class="o_hide-lg"
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Price:&nbsp;
                                                </span>$1,000 USD[TODO]</p>



                                        </div>
                                    </div>



                                    <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->

                                    <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0"
                                            role="presentation">
                                            <tbody>
                                                <tr>
                                                    <td class="o_re o_bb-light"
                                                        style="font-size: 16px;line-height: 16px;height: 16px;vertical-align: top;border-bottom: 1px solid #d3dce0;">
                                                        &nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>


    <!-- invoice_row -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-dark o_px o_pb-md" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #F45500;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text o_text-white o_left o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_mb-xxs" style="margin-top: 0px;margin-bottom: 4px;">
                                                <strong>Plaintiff's Case</strong>
                                                <span class="o_text-xxs"
                                                    style="font-size: 12px;line-height: 19px;">(Seeker)</span></p>
                                            <p class="o_text-xs"
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 0px;">
                                                Case sent on
                                                {{ $plaintiffCase->created_at->format('H:i a, l, M j Y') }}</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 0px; height: 0px;">&nbsp; </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max"
                                                            src="{{ $plaintiffCase->user->avatar }}" width="96"
                                                            height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #F45500;">Plaintiff
                                                        </strong><strong class="o_text-dark" style="color: #242b3d;">|
                                                            {{ $plaintiffCase->user->full_name }}</strong> <span
                                                            class="o_text-default o_text-xs"
                                                            style="font-size: 14px;line-height: 21px;">&nbsp;<span
                                                                class="o_text-light" style="color: #8BDB02;">●&nbsp;
                                                            </span> LV
                                                            {{ $plaintiffCase->user->level }}</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        {{ $plaintiffCase->created_at->format('H:i a, l, M j Y') }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>{{ $plaintiffCase->title }}</strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">
                                        {{ $plaintiffCase->description }}</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>

                                    @foreach($defendantCase->dispute_attachments as $attachment)
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="{{ $attachment->url }}"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="{{ asset('public/assets/images/email/dispute/attachment-24.png') }}"
                                                            width="24" height="24" alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            {{ $attachment->name }}</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach

                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-dark o_px o_pb-md" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #126DE5;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text o_text-white o_left o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_mb-xxs" style="margin-top: 0px;margin-bottom: 4px;">
                                                <strong>Defendant's Case</strong>
                                                <span class="o_text-xxs"
                                                    style="font-size: 12px;line-height: 19px;">(Alchemist)</span></p>
                                            <p class="o_text-xs"
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 0px;">
                                                Case sent at
                                                {{ $defendantCase->created_at->format('H:i a, l, M j Y') }}</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 0px; height: 0px;">&nbsp; </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max"
                                                            src="{{ $defendantCase->user->avatar }}" width="96"
                                                            height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #126DE5;">Defendant |
                                                        </strong><strong class="o_text-dark"
                                                            style="color: #242b3d;">{{ $defendantCase->user->full_name }}</strong>
                                                        <span class="o_text-default o_text-xs"
                                                            style="font-size: 14px;line-height: 21px;">&nbsp;<span
                                                                class="o_text-light" style="color: #8BDB02;">●&nbsp;
                                                            </span> LV
                                                            {{ $defendantCase->user->level }}</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        {{ $defendantCase->created_at->format('H:i a, l, M j Y') }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>{{ $defendantCase->title }} </strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">
                                        {{ $defendantCase->description }}</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>
                                    @foreach($plaintiffCase->dispute_attachments as $attachment)
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="{{ $attachment->url }}"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="{{ asset('public/assets/images/email/dispute/attachment-24.png') }}"
                                                            width="24" height="24" alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            {{ $attachment->name }}</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    @endforeach
                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_re o_bg-dark o_px o_pb-md" align="center"
                                    style="font-size: 0;vertical-align: top;background-color: #242B3D;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs o_sans o_text o_text-white o_left o_xs-center"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_mb-xxs" style="margin-top: 0px;margin-bottom: 4px;">
                                                <strong>Arbiter Case
                                                    Files[TODO]</strong> <span class="o_text-xxs"
                                                    style="font-size: 12px;line-height: 19px;">(5/5)</span></p>
                                            <p class="o_text-xs"
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 0px;">
                                                Find all Arbiter
                                                Case files and details:</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-3"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                        <div style="font-size: 24px; line-height: 0px; height: 0px;">&nbsp; </div>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max" src="../images/person-48.png"
                                                            width="96" height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #242B3D;">Arbiter 01 |
                                                        </strong><strong class="o_text-dark"
                                                            style="color: #77C500;">Winner</strong>&nbsp;| In favour of
                                                        the <span>Defendant</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        Submitted 16:40 pm, Friday, Mar 31 2019</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>There was not suffcient information to finish the milestone in question.
                                        </strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">If you are sued, you
                                        become a
                                        defendant. The first thing that happens is that you are served with a complaint
                                        or a petition
                                        (depending on the type of case). This document is served by an officer of the
                                        court (a sheriff's
                                        deputy, for example). Sometimes the document requires you to appear in court.
                                        This would happen in a
                                        small claims court case. In other types of lawsuits (a divorce case, for
                                        example), you would have to
                                        file a document in response.</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">


                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            videoidea.mp4</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.pdf</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.jpg</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max" src="../images/person-48.png"
                                                            width="96" height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #242B3D;">Arbiter 02 |
                                                        </strong><strong class="o_text-dark"
                                                            style="color: #FF0303;">Lost</strong> | In favour of the
                                                        Plaintiff</p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        Submitted 16:40 pm, Friday, Mar 31 2019</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>There was not suffcient information to finish the milestone in question.
                                        </strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">If you are sued, you
                                        become a
                                        defendant. The first thing that happens is that you are served with a complaint
                                        or a petition
                                        (depending on the type of case). This document is served by an officer of the
                                        court (a sheriff's
                                        deputy, for example). Sometimes the document requires you to appear in court.
                                        This would happen in a
                                        small claims court case. In other types of lawsuits (a divorce case, for
                                        example), you would have to
                                        file a document in response.</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">


                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            videoidea.mp4</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.pdf</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.jpg</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max" src="../images/person-48.png"
                                                            width="96" height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #242B3D;">Arbiter 04 |
                                                        </strong><strong class="o_text-dark"
                                                            style="color: #77C500;">Winner</strong> | In favour of the
                                                        <span>Defendant</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        Submitted 16:40 pm, Friday, Mar 31 2019</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>There was not suffcient information to finish the milestone in question.
                                        </strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">If you are sued, you
                                        become a
                                        defendant. The first thing that happens is that you are served with a complaint
                                        or a petition
                                        (depending on the type of case). This document is served by an officer of the
                                        court (a sheriff's
                                        deputy, for example). Sometimes the document requires you to appear in court.
                                        This would happen in a
                                        small claims court case. In other types of lawsuits (a divorce case, for
                                        example), you would have to
                                        file a document in response.</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">


                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            videoidea.mp4</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.pdf</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.jpg</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: ">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-secondary" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 5px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 18px;padding-bottom: 0px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <a href="#"><img class="o_br-max" src="../images/person-48.png"
                                                            width="96" height="96" alt=""
                                                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;"></a>
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark" style="color: #242B3D;">Arbiter 05 |
                                                        </strong><strong class="o_text-dark"
                                                            style="color: #77C500;">Winner</strong> | In favour of the
                                                        <span>Defendant</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        Submitted 16:40 pm, Friday, Mar 31 2019</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <p class="o_text o_text-secondary"
                                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                                        <strong>There was not suffcient information to finish the milestone in question.
                                        </strong></p>
                                    <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 5px;">If you are sued, you
                                        become a
                                        defendant. The first thing that happens is that you are served with a complaint
                                        or a petition
                                        (depending on the type of case). This document is served by an officer of the
                                        court (a sheriff's
                                        deputy, for example). Sometimes the document requires you to appear in court.
                                        This would happen in a
                                        small claims court case. In other types of lawsuits (a divorce case, for
                                        example), you would have to
                                        file a document in response.</p>
                                    <p class="o_text-primary"
                                        style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Case
                                            Files:</em></p>
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">


                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            videoidea.mp4</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.pdf</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">

                                        <tbody>
                                            <tr>
                                                <td class="o_btn-b o_heading o_text-xs" align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">

                                                    <a class="o_text-primary" href="https://example.com/"
                                                        style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                                            src="../images/attachment-24.png" width="24" height="24"
                                                            alt=""
                                                            style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                                        <span
                                                            style="mso-text-raise: 6px;display: inline;color: #126de5;">
                                                            logoidea.jpg</span></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="o_text-primary"
                                        style="color: #126de5;margin-top: 20px;margin-bottom: 0px; border-top: solid 1px #D3DCE0">
                                    </p>

                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr> </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>



    <!-- invoice_row -->
    <!-- invoice_row -->
    <!-- invoice_row -->




    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="center"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;margin-top: 10px">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto; style=" padding: 10px 0 10px 0"">
                        <tbody>
                            <tr>
                                <td class="o_bg-white o_px o_pb-md" align="center"
                                    style="background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td align="center" valign="top" style="padding:0px 8px;"><![endif]-->
                                    <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    </div>
                                    <!--[if mso]></td><td align="center" valign="top" style="padding:0px 8px;"><![endif]-->

                                    <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                            <table align="center" cellspacing="0" cellpadding="0" border="0"
                                                role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td class="o_btn o_bg-dark o_br o_heading o_text" align="center"
                                                            style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #7FBA00;border-radius: 4px;">
                                                            <a class="o_text-white" href="https://example.com/"
                                                                style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Download
                                                                Results</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                                        <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                        <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                            <table align="center" cellspacing="0" cellpadding="0" border="0"
                                                role="presentation">
                                                <tbody>
                                                    <tr>
                                                        <td class="o_btn o_bg-dark o_br o_heading o_text" align="center"
                                                            style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #242B3D;border-radius: 4px;">
                                                            <a class="o_text-white"
                                                                href="{{ route('dispute.single', ['id' => $dispute->id]) }}"
                                                                style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Results
                                                                Panel&nbsp;→</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--[if mso]></td></tr></table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--[if mso]></td></tr></table><![endif]-->
                </td>
            </tr>
        </tbody>
    </table>



    <!-- invoice_row -->

    <!-- invoice-total-light -->
    <!-- spacer -->
    <!-- content -->
    <!-- button-dark -->
    <!-- spacer-lg -->
    <!-- footer-light-2cols -->
    @include('emails.shared.footer')
</body>

</html>