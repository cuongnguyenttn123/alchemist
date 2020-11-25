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
                                <p style="margin-top: 0px;margin-bottom: 0px;"> DISPUTE DETAILS</p>
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
                            <td class="o_re o_bg-white o_px o_pb-md" align="center"
                                style="font-size: 0;vertical-align: top;background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;">
                                <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="300" align="center" valign="top" style="padding: 0px 8px;"><![endif]-->

                                <div class="o_col o_col-3 o_col-full"
                                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <div class="o_px-xs o_sans o_text-xs o_text-secondary o_left o_xs-left"
                                        style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;"><strong>Project
                                                Details</strong>
                                        </p>
                                        <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;">
                                            <strong>Project ID:</strong> #{{ $project->id }}<br>
                                            <strong>Total Price:</strong> $2300[TODO] USD<br>
                                            <strong>Delivery Date:</strong> 14:05 12/12/2019[TODO]<br>
                                            <strong>Project Timeline:</strong> 120 Days[TODO]<br>
                                            <strong>Total Milestones:</strong> {{ $project->milestone->count() }}
                                            Milestones<br>
                                        </p>
                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;"><strong>Project
                                                Category &
                                                Skills</strong></p>
                                        <p style="margin-top: 0px;margin-bottom: 0px;"><strong>Category:</strong>
                                            {{ $project->categories->implode('name', ' / ') }}</p>
                                        <p style="margin-top: 0px;margin-bottom: 24px;">
                                            <strong>Skills:</strong>{{ $project->skills->implode('name', ', ') }}</p>

                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;"><strong>Dispute
                                                Information</strong></p>
                                        <p class="o_mb-md" style="margin-top: 0px;margin-bottom: 24px;"> <strong>Dispute
                                                ID:</strong>
                                            #{{ $dispute->id }}<br>
                                            <strong>Dispute Requested:</strong>
                                            {{ $dispute->created_at->format('H:i j/n/Y') }}<br>
                                            <strong>Dispute Accepted:</strong> 14:05 12/12/2019[TODO]<br>
                                            <strong>Arbiters Accepted Invite: </strong>12/22/2019[TODO]<br>
                                            <strong>Disputed Milestone:
                                            </strong>{{ sprintf('%02d', $milestone->position) }} |
                                            {{ $milestone->percent_payment }}%<br>
                                            <strong>Disputed Amount: </strong>{{ formatMoney($dispute->amount) }}<br>
                                            <strong>Dispute Stake: </strong>600 Craft Credits[TODO]<br>
                                        </p>
                                    </div>
                                </div>



                                <div class="o_col o_col-3 o_col-full"
                                    style="display: inline-block;vertical-align: top;width: 100%;max-width: 300px;">
                                    <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                    <div class="o_px-xs o_sans o_text-xs o_text-secondary o_left o_xs-left"
                                        style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;color: #424651;text-align: left;padding-left: 8px;padding-right: 8px;">
                                        <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;"><strong>Alchemist
                                                Gain:</strong></p>
                                        @for($i = 1; $i <= 5; $i++) @php $per=100 - (5 - $i) * 20; @endphp <p
                                            style="margin-top: 0px;margin-bottom: 0px;">
                                            {{ $i }}/5 Votes ({{ $per }}%)&nbsp;
                                            &nbsp; &nbsp; &nbsp;= Gain
                                            <span><strong>
                                                    {{ formatMoney($dispute->amount * $per / 100) }}
                                                </strong></span>
                                            </p>
                                            @endfor

                                            <p class="o_mb-xs" style="margin-top: 0px;margin-bottom: 8px;">
                                                <strong>Seeker
                                                    Payout:</strong></p>
                                            @for($i = 0; $i <= 5; $i++) @php $per=100 - (5 - $i) * 20; @endphp <p
                                                style="margin-top: 0px;margin-bottom: 0px;">
                                                {{ $i }}/5 Votes ({{ $per }}%)&nbsp;
                                                &nbsp; &nbsp; &nbsp;= Pay
                                                <span><strong>
                                                        {{ formatMoney($dispute->amount - $dispute->amount * $per / 100) }}
                                                    </strong></span>
                                                </p>
                                                @endfor

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