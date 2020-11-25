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
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #126de5;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td class="o_sans o_text o_text-white o_b-white o_px o_py o_br-max"
                                                    align="center"
                                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;border: 2px solid #ffffff;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <img src="{{ asset('public/assets/images/email/project/star-48-white.png') }}"
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
                                        Review Received! </h2>

                                    <p style="margin-top: 0px;margin-bottom: 20px;">Hi
                                        <span>{{ $user_to->full_name }}</span>,
                                        <span>{{ $user_from->full_name }} has rated for project ID:
                                            #{{ $project->id }}</span></p>
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
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                            <p><strong>Project ID: #{{ $project->id }}</strong>
                                                ({{ $project->accepted_milestones->sum('workday') }} days /
                                                {{ formatMoney($project->accepted_milestones->sum('price')) }}) </p>
                                            <p
                                                style="font-size: 14px;line-height: 21px;margin-top: 0px;margin-bottom: 0px;">
                                                <strong>{{ $project->name }}</strong></p>
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
    <!-- invoice_row -->
    <!-- invoice_row -->
    <!-- invoice_row -->
    <!-- invoice_row -->

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
        <tbody>
            <tr>
                <td class="o_bg-light o_px-xs" align="left"
                    style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                    <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                    <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation"
                        style="max-width: 632px;margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td width="32" class="o_bg-white o_br-light"
                                    style="background-color: #ffffff;border-right: 4px solid #d3dce0;">&nbsp; </td>
                                <td class="o_bg-white o_px-md o_py-md o_sans o_text o_text-light" align="left"
                                    style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 24px;padding-bottom: 24px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="48" class="o_bb-light o_text-md o_text-secondary o_sans o_py"
                                                    align="right"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;color: #424651;border-bottom: 1px solid #d3dce0;padding-top: 16px;padding-bottom: 16px;">
                                                    <img class="o_br-max" src="{{ $user_from->avatar }}" width="96"
                                                        height="96" alt=""
                                                        style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;border-radius: 96px;">
                                                </td>
                                                <td class="o_bb-light o_text o_text-secondary o_sans o_px o_py"
                                                    align="left"
                                                    style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border-bottom: 1px solid #d3dce0;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                                                    <p style="margin-top: 0px;margin-bottom: 0px;"><strong
                                                            class="o_text-dark"
                                                            style="color: #242b3d;">{{ $user_from->full_name }}</strong>
                                                        <span class="o_text-default o_text-xs"
                                                            style="font-size: 14px;line-height: 21px;">&nbsp;<span
                                                                class="o_text-light" style="color: #8BDB02;">●&nbsp;
                                                            </span>{{ $user_from->is_seeker() ? "Seeker" : "Alchemist" }}
                                                            Tier
                                                            {{ $user_from->user_tier() }} | LV
                                                            {{ $user_from->level }}</span></p>
                                                    <p class="o_text-xxs o_text-light"
                                                        style="font-size: 12px;line-height: 19px;color: #82899a;margin-top: 0px;margin-bottom: 0px;">
                                                        {{ $review->created_at->format('h:ia, l, M j Y') }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    {{ $review->content }}
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
                                    <p style="margin-top: 0px;margin-bottom: 0px;">Review Criteria Results</p>
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
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Item</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_center"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Rating</p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text-xs o_right"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: right;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-light"
                                                style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">SBP Earned
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


    @foreach($review->ratings as $rating)
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
                                                <strong>{{ $rating->name }}</strong></p>
                                        </div>
                                    </div>
                                    <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                                    <div class="o_col o_col-1 o_col-full"
                                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                                        <div class="o_px-xs o_sans o_text o_center o_xs-left"
                                            style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: center;padding-left: 8px;padding-right: 8px;">
                                            <p class="o_text-secondary"
                                                style="color: #126DE5;margin-top: 0px;margin-bottom: 0px;"><span
                                                    class="o_hide-lg"
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Rating:&nbsp;
                                                </span>{{ str_repeat('★', $rating->value) . str_repeat('☆', 5 - $rating->value) }}
                                            </p>
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
                                                    style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">SBP
                                                    Earned:&nbsp; </span>{{ $rating->point }} SBP</p>
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
                                <td class="o_bg-white"
                                    style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;">
                                    &nbsp; </td>
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
                                <td class="o_bg-white o_px-md o_pt" align="center"
                                    style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;">
                                    <h3 class="o_heading o_text-dark"
                                        style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;color: #242b3d;font-size: 24px;line-height: 31px;">
                                        Total SBP Earned</h3>
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
                                <td class="o_bg-white o_px-md o_pt" align="center"
                                    style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;">
                                    <h4 class="o_heading o_text-dark"
                                        style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;color: #242b3d;font-size: 18px;line-height: 23px;">
                                        {{ $review->ratings->pluck('point')->sum() }} SBP</h4>
                                    <table align="center" cellspacing="0" cellpadding="0" border="0"
                                        role="presentation">
                                        <tbody>
                                            <tr>
                                                <td width="140" class="o_bb-light"
                                                    style="font-size: 8px;line-height: 8px;height: 8px;border-bottom: 1px solid #d3dce0;">
                                                    &nbsp;
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
                                <td class="o_bg-white o_px-md o_py" align="center"
                                    style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                                    <h4 class="o_heading o_mb-xs o_text-secondary"
                                        style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 8px;color: #424651;font-size: 18px;line-height: 23px;">
                                        Review Average</h4>
                                    <h1 class="o_heading o_text-primary"
                                        style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;color: #126de5;font-size: 36px;line-height: 47px;">
                                        {{ $review->ratings->avg('value') }} Stars</h1>
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
                                <td class="o_bg-white"
                                    style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;">
                                    &nbsp; </td>
                            </tr>
                        </tbody>
                    </table>
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