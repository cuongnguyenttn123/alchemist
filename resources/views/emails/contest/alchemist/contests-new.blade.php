<!--
  App\Model\User $user
  array App\Model $contests with eager loaded categories, skill and attachments
-->

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
        /*src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff2) format("woff2");*/
        src: local("Roboto"), local("Roboto-Regular"), url('public/frontend/js/KFOmCnqEu92Fr1Mu7GxKOzY.woff2') format("woff2");
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
      }

      @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        /*src: local("Roboto"), local("Roboto-Regular"), url(https://fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2) format("woff2");*/
        src: local("Roboto"), local("Roboto-Regular"), url('public/frontend/js/KFOmCnqEu92Fr1Mu4mxK.woff2') format("woff2");
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
      }

      @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        /*src: local("Roboto Bold"), local("Roboto-Bold"), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2) format("woff2");*/
        src: local("Roboto Bold"), local("Roboto-Bold"), url('public/frontend/js/KFOlCnqEu92Fr1MmWUlfChc4EsA.woff2') format("woff2");
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
      }

      @font-face {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 700;
        /*src: local("Roboto Bold"), local("Roboto-Bold"), url(https://fonts.gstatic.com/s/roboto/v18/KFOlCnqEu92Fr1MmWUlfBBc4.woff2) format("woff2");*/
        src: local("Roboto Bold"), local("Roboto-Bold"), url('public/frontend/js/KFOlCnqEu92Fr1MmWUlfBBc4.woff2') format("woff2");
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
                <td class="o_bg-primary o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white" align="center"
                  style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #126de5;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;">
                  <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                    <tbody>
                      <tr>
                        <td class="o_sans o_text o_text-white o_b-white o_px o_py o_br-max" align="center"
                          style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #ffffff;border: 2px solid #ffffff;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                          <img src="{{ asset('public/assets/images/email/contest/trophy-white.png') }}" width="96"
                            height="96" alt=""
                            style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                      </tr>
                    </tbody>
                  </table>
                  <h2 class="o_heading o_mb-xxs"
                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">
                    New Contests Available!</h2>
                  <p style="margin-top: 0px;margin-bottom: 0px;">Hi <span>{{ $user->full_name }},</span> check out the
                    latest </p>
                  <p style="margin-top: 0px;margin-bottom: 0px;">Contests matching your skills.</p>
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
                <td class="o_bg-white"
                  style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;">&nbsp; </td>
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
                      <p class="o_text-light" style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Contests</p>
                    </div>
                  </div>
                  <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                  <div class="o_col o_col-1"
                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                    <div class="o_px-xs o_sans o_text-xs o_center"
                      style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: center;padding-left: 8px;padding-right: 8px;">
                      <p class="o_text-light" style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Days Left</p>
                    </div>
                  </div>
                  <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                  <div class="o_col o_col-1"
                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                    <div class="o_px-xs o_sans o_text-xs o_right"
                      style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;text-align: right;padding-left: 8px;padding-right: 8px;">
                      <p class="o_text-light" style="color: #82899a;margin-top: 0px;margin-bottom: 0px;">Prize</p>
                    </div>
                  </div>
                  <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->
                  <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
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
  <!-- invoice_row -->

  @foreach($contests as $contest)
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

                      {{-- <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                        <div class="o_px-xs" style="padding-left: 0px;padding-right: 8px;margin-bottom: 5px">
                          <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                            <tbody>
                              <tr>
                                <td class="o_btn o_bg-primary o_br o_heading o_text" align="center"
                                  style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 10px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #91CD00;border-radius: 4px;">
                                  <span class="o_text-white"
                                    style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 2px 11px;mso-text-raise: 3px;">FEATURED</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div> --}}
                      <p class="o_text o_text-secondary"
                        style="font-size: 16px;line-height: 24px;color: #424651;margin-top: 0px;margin-bottom: 5px;">
                        <strong>{{ $contest->name_contest }}</strong></p>
                      <p class="o_text-light" style="color: #82899a;margin-top: 0px;margin-bottom: 5px;">
                        {{ $contest->rules }}</p>
                      <p class="o_text-primary" style="color: #126de5;margin-top: 0px;margin-bottom: 0px;">
                        <strong>{{ $contest->categories->implode('name', ' / ') }}</strong></p>
                      <p class="o_text-primary" style="color: #126de5;margin-top: 0px;margin-bottom: 5px;">
                        <em>{{ $contest->skill->implode('name', ', ') }}</em></p>
                      <p class="o_text-primary" style="color: #FF8B00;margin-top: 0px;margin-bottom: 5px;"><em>SPB
                          Earnings: 1st: {{ App\Libs\Calculator::contestPointEarn('', 1) }} | 2nd: {{ App\Libs\Calculator::contestPointEarn('', 2) }} | 3rd: {{ App\Libs\Calculator::contestPointEarn('', 3) }} </em></p>
                      <p class="o_text-primary" style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Entry
                          Starts:
                          {{ \Carbon\Carbon::createFromFormat('d-m-Y', $contest->time_start)->format('jS F Y') }}</em>
                      </p>
                      <p class="o_text-primary" style="color: #8289A0;margin-top: 0px;margin-bottom: 5px;"><em>Entry
                          Ends:
                          {{ \Carbon\Carbon::createFromFormat('d-m-Y', $contest->time_end)->format('jS F Y') }}</em></p>


                      @foreach($contest->attachments as $attachment)
                      <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                        <tbody>
                          <tr>
                            <td class="o_btn-b o_heading o_text-xs" align="center"
                              style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;mso-padding-alt: 7px 8px;">
                              <a class="o_text-primary" href="{{ asset('public/' . $attachment->url) }}"
                                style="text-decoration: none;outline: none;color: #126de5;display: block;padding: 0px 8px 0px 0px;font-weight: bold;"><img
                                  src="{{ asset('public/assets/images/email/contest/attachment-24.png') }}" width="24"
                                  height="24" alt=""
                                  style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                                <span
                                  style="mso-text-raise: 6px;display: inline;color: #126de5;">{{ $attachment->name }}</span></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      @endforeach

                      <div class="o_col o_col-2 o_col-full"
                        style="display: inline-block;vertical-align: top;width: 100%;max-width: 250px;">
                        <div style="font-size: 10px; line-height: 10px; height: 10px;">&nbsp; </div>
                        <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                          <div class="o_px-xs" style="padding-left: 0px;padding-right: 8px;margin-bottom: 5px">
                            <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                              <tbody>
                                <tr>
                                  <td class="o_btn o_bg-primary o_br o_heading o_text" align="center"
                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 13px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #126DE9;border-radius: 4px;">
                                    <a class="o_text-white" href="{{ route('contest.detail', ['id' => $contest->id]) }}"
                                      style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 5px 15px;mso-text-raise: 3px;">SAVE</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                          <div class="o_px-xs" style="padding-left: 0px;padding-right: 8px;margin-bottom: 5px">
                            <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                              <tbody>
                                <tr>
                                  <td class="o_btn o_bg-primary o_br o_heading o_text" align="center"
                                    style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 13px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #242B3D;border-radius: 4px;">
                                    <a class="o_text-white"
                                      href="{{ route('contest.detail', ['id' => $contest->id]) }}"
                                      style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 5px 15px;mso-text-raise: 3px;">ENTER
                                      CONTEST</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--[if mso]></td><td width="100" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->
                  <div class="o_col o_col-1 o_col-full"
                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                    <div class="o_px-xs o_sans o_text o_center o_xs-left"
                      style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: center;padding-left: 8px;padding-right: 8px;">
                      <p class="o_text-secondary" style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                          class="o_hide-lg"
                          style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Entry
                          Days Left:&nbsp; </span>{{ $contest->day_left }}</p>
                    </div>
                  </div>
                  <!--[if mso]></td><td width="100" align="right" valign="top" style="padding: 0px 8px;"><![endif]-->
                  <div class="o_col o_col-1 o_col-full"
                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 100px;">
                    <div class="o_px-xs o_sans o_text o_right o_xs-left"
                      style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;text-align: right;padding-left: 8px;padding-right: 8px;">
                      <p class="o_text-secondary" style="color: #424651;margin-top: 0px;margin-bottom: 0px;"><span
                          class="o_hide-lg"
                          style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Prize:&nbsp;
                        </span>{{ formatMoney($contest->total_prize) }} </p>
                    </div>
                  </div>

                  <!--[if mso]></td></tr><tr><td colspan="3" style="padding: 0px 8px;"><![endif]-->

                  <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
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
                <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center"
                  style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">

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
                <td class="o_bg-white o_px-md o_py-xs" align="center"
                  style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 8px;padding-bottom: 8px;">
                  <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                    <tbody>
                      <tr>
                        <td width="300" class="o_btn o_bg-dark o_br o_heading o_text" align="center"
                          style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #242b3d;border-radius: 4px;">
                          <a class="o_text-white" href="{{ url('/list-contests') }}"
                            style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">View
                            More Contests</a>
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
                <td class="o_bg-white"
                  style="font-size: 48px;line-height: 48px;height: 48px;background-color: #ffffff;">&nbsp; </td>
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
