<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html lang="en" style="min-height: 100%; font-family: Helvetica, Arial, sans-serif !important; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; position: relative; box-sizing: border-box; font-size: 12px; width: 100%; background: #fff; margin: 0;">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description">
      <meta name="author">
      <title>Business Box</title>
      <link rel="stylesheet" href="email.css">
      <!--[if mso]>
      <style type="text/css">body,table,td{font-family:Arial,Helvetica,sans-serif!important}a{text-decoration:none}</style>
      <![endif]--> 
   </head>
   <body style="margin:0;padding:0;background-color:#ffffff;">
      <!--[if mso]>
      <style type="text/css">body,table,td{font-family:Arial,Helvetica,sans-serif!important}a{text-decoration:none}</style>
      <![endif]--> 
      <table cellpadding="0" cellspacing="0" border="0" style="width:100%;background-color:#ffffff;">
         <tbody>
            <tr>
               <td style="font-size:0;"></td>
               <td align="center" valign="top" style="padding-bottom:40px;width:600px;background-color:#ffffff;">
                  <table cellspacing="0" cellpadding="0" border="0" width="100%">
                     <tbody>
                        <tr>
                           <td align="center">
                              <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                 <tbody>
                                    <tr>
                                       <td align="center" style="padding:40px 0px;">
                                          <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                             <tbody>
                                                <tr>
                                                   <td align="center">
                                                      <a href=""><img alt="" border="0" width="160" style="box-sizing: border-box; clear: both; display: inline-block; min-width: 50%; outline: none; position: relative; text-decoration: none; font-family: helvetica, arial, sans-serif !important; width: 160px; border-width: 0px; border-style: solid;" src="https://saas.nxgbs.com/user-uploads/app-logo/8c8fc848b9edc8a5e1b5437637995c78.png"/></a>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <!-- ################################################### HERO BLOCK 01 ################################################# --> 
                  <table cellpadding="0" cellspacing="0" border="0" style="width:100%; background-color:#ffffff; max-width: 600px; " class="mw100" width="600">
                     <tbody>
                        <tr>
                           <td align="center" style="padding: 30px 0; border: 1px solid #eff0f1; padding-left:10px ;">
                              <table style="width:100%;min-width:100%;table-layout:fixed;border-collapse:separate;border-spacing:0;" cellspacing="0" cellpadding="0">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                             <tbody>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="border-radius:16px;line-height:16px;min-width:32px;height:32px;width:32px;text-align:center;vertical-align:middle">
                                                                  @if(!empty($project_added['profile_images_url']))
                                                                  <img src="{{$project_added['profile_images_url']}}" style="border-radius:32px;display:block;line-height:32px" class="CToWUd" width="32" height="32">
                                                                  @else
                                                                  <div class="symbol symbol-lg-75 " id="name-character">
                                             						<span class="symbol-label font-size-h3 font-weight-boldest" id="add-letter">
                                                						{{ mb_substr($project_added['name'], 0, 1) }}
                                                   
                                             						</span>
                                            						</div>
                                                                  @endif
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                   <td style="max-width:16px;min-width:16px;width:16px">&nbsp;</td>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td><span style="font-size:20px;font-weight:400;line-height:26px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($project_added['name']) ? $project_added['name'] : '-'}} assigned a task to {{!empty($assign_to['name']) ? ucwords($assign_to['name']): '-'}}</span></a></td>
                                                            </tr>
                                                            <tr>
                                                               <td><a href="{{ URL::to(isset($type) ? $type.'/dashboard' : '#') }}"><span style="font-size:13px;font-weight:400;line-height:20px;color:#14aaf5;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">View</span></a></td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <table style="width:100%;min-width:100%;table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                             <tbody>
                                                <tr>
                                                   <td style="line-height:16px;max-width:0;min-width:0;height:16px;width:0;font-size:16px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td style="background-color:#e8ecee;height:1px;width:100%">
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                 <tbody>
                                    <tr>
                                       <td align="center" style="padding:35px 0px;">
                                          <table style="width:100%;min-width:100%;table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                             <tbody>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Task</span></td>
                                                            </tr>
                                                            <tr>
                                                               <td style="vertical-align:top"><a href="https://app.asana.com/app/asana/-/log_view?se=%7B%22name%22%3A%22AsanaLoaded%22%2C%22action%22%3A%22AsanaLoaded%22%2C%22sub_action%22%3A%22Task%22%2C%22location%22%3A%22TaskNotificationEmail%22%2C%22sub_location%22%3A%22TaskTitle%22%2C%22task%22%3A1174371033527098%2C%22luna2%22%3Atrue%2C%22story_type%22%3A%22TaskAssignedComment%22%2C%22domain%22%3A362839713723123%2C%22domain_user%22%3A1127813973768496%2C%22notification%22%3A1174376475103912%2C%22user%22%3A1127813973768495%2C%22non_user_action_event%22%3Afalse%2C%22task_type%22%3A%22task%22%2C%22story%22%3A1174376475036301%2C%22email_uuid%22%3A%221588708722714-fa999fb3-9abf-40bc-abe8-8e3592485af9%22%2C%22app_name%22%3A%22email%22%7D&amp;dest=https%3A%2F%2Fapp.asana.com%2F0%2F1133987119141521%2F1174371033527098&amp;hash=d138a96be608cdb6478eaf601c1cd92fa74e2b3ed5daab25a050add7b7d4382b" style="text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://app.asana.com/app/asana/-/log_view?se%3D%257B%2522name%2522%253A%2522AsanaLoaded%2522%252C%2522action%2522%253A%2522AsanaLoaded%2522%252C%2522sub_action%2522%253A%2522Task%2522%252C%2522location%2522%253A%2522TaskNotificationEmail%2522%252C%2522sub_location%2522%253A%2522TaskTitle%2522%252C%2522task%2522%253A1174371033527098%252C%2522luna2%2522%253Atrue%252C%2522story_type%2522%253A%2522TaskAssignedComment%2522%252C%2522domain%2522%253A362839713723123%252C%2522domain_user%2522%253A1127813973768496%252C%2522notification%2522%253A1174376475103912%252C%2522user%2522%253A1127813973768495%252C%2522non_user_action_event%2522%253Afalse%252C%2522task_type%2522%253A%2522task%2522%252C%2522story%2522%253A1174376475036301%252C%2522email_uuid%2522%253A%25221588708722714-fa999fb3-9abf-40bc-abe8-8e3592485af9%2522%252C%2522app_name%2522%253A%2522email%2522%257D%26dest%3Dhttps%253A%252F%252Fapp.asana.com%252F0%252F1133987119141521%252F1174371033527098%26hash%3Dd138a96be608cdb6478eaf601c1cd92fa74e2b3ed5daab25a050add7b7d4382b&amp;source=gmail&amp;ust=1599911728322000&amp;usg=AFQjCNEW6ulEoAfkHL-UyRwyARaWpe9JUQ"><span style="font-size:16px;font-weight:600;line-height:24px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($task_title) ? $task_title: '-'}}</span></a></td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Assigned to</span></td>
                                                               <td style="max-width:48px;min-width:48px;width:48px">&nbsp;</td>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Due date</span></td>
                                                            </tr>
                                                            <tr>
                                                               <td style="vertical-align:top"><span style="font-size:13px;font-weight:400;line-height:20px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($assign_to['name']) ? ucwords($assign_to['name']): '-'}}</span></td>
                                                               <td style="max-width:48px;min-width:48px;width:48px">&nbsp;</td>
                                                               <td style="vertical-align:top"><span style="font-size:13px;font-weight:400;line-height:20px;color:#ed4758;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{ !empty($due_date) ? date("M j",strtotime(str_replace('/', '-', $due_date))) : '-' }}</span></td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Description</span></td>
                                                            </tr>
                                                            <tr>
                                                               <td style="vertical-align:top"><span style="font-size:13px;font-weight:400;line-height:20px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($description) ? $description: '-'}}.<br><br></span></td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Projects</span></td>
                                                            </tr>
                                                            <tr>
                                                               <td style="vertical-align:top">
                                                                  <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td>
                                                                              <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="line-height:20px">
                                                                                          <div style="display:inline-block;height:9px;width:9px;min-width:9px;border-radius:3px;background-color:#ea4e9d"></div>
                                                                                       </td>
                                                                                       <td style="max-width:8px;min-width:8px;width:8px">&nbsp;</td>
                                                                                       <td><span style="font-size:13px;font-weight:400;line-height:20px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($project_title)  ? ucwords($project_title): '-'}}</span></td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td>
                                                      <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td style="vertical-align:bottom"><span style="font-size:13px;font-weight:600;line-height:20px;color:#6f7782;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif"></span></td>
                                                            </tr>
                                                            <tr>
                                                               <td style="vertical-align:top">
                                                                  <table style="table-layout:fixed;border-collapse:separate;border-spacing:0" cellspacing="0" cellpadding="0">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="vertical-align:top"><span style="font-size:13px;font-weight:600;line-height:20px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">Priority</span></td>
                                                                           <td style="max-width:16px;min-width:16px;width:16px">&nbsp;</td>
                                                                           <td style="vertical-align:top"><span style="font-size:13px;font-weight:400;line-height:20px;color:#151b26;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif">{{!empty($priority) ? ucwords($priority): '-'}}</span></td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                   <td style="line-height:24px;max-width:0;min-width:0;height:24px;width:0;font-size:24px">&nbsp;</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <!-- ################################################### TEXT BANNER BLOCK 01 (White button with purple border) ################################################# --> 
                  <!-- ################################################### FOOTER ################################################# -->
                  <table cellpadding="0" cellspacing="0" border="0" style="width:100%;background-color:#ffffff;">
                     <tbody>
                        <tr>
                           <td align="center">
                              <table cellpadding="0" cellspacing="0" border="0" style="width:100%;background-color:#ffffff; max-width: 600px;" width="600">
                                 <tbody>
                                    <tr>
                                       <td align="center">
                                          <!--[if mso]><!--> 
                                          <table border="0" cellpadding="0" cellspacing="0" class="show-for-mobile" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;display:none; max-width: 600px;">
                                             <tbody>
                                                <tr>
                                                   <td align="center" style="padding: 30px 0 0;">
                                                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;min-width:100%">
                                                         <tbody>
                                                            <tr>
                                                               <td align="center">
                                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;min-width:100%">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td align="center">
                                                                              <table align="center" cellspacing="0" border="0" style="width: 100%; max-width: 320px;"> </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;min-width:100%">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td align="center" style="border-bottom:1px solid #EDF1F2; padding-top: 30px;"></td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <!--<![endif]--><!-- /END Add Download app Icons in this seciton --> 
                                          <table cellpadding="0" cellspacing="0" border="0" style="width:100%;background-color:#ffffff; max-width: 600px;" class="mw100" width="600">
                                             <tbody>
                                                <tr>
                                                   <td align="center" style="padding: 30px 0 15px;">
                                                      <table cellpadding="0" cellspacing="0" border="0" style="width:88%;background-color:#ffffff; max-width: 528px;">
                                                         <tbody>
                                                            <tr>
                                                               <td style="color: #646F79; font-family: Helvetica, Arial, sans-serif !important; font-weight: normal; text-align: center; line-height: 16px; font-size: 10px; position: relative; box-sizing: border-box; margin: 0px; padding: 0;">You've received this email from Business Box.</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="color: #646F79; font-family: Helvetica, Arial, sans-serif !important; font-weight: normal; text-align: center; line-height: 16px; font-size: 10px; position: relative; box-sizing: border-box; margin: 0px; padding: 0; padding-top: 15px;">1550 Bryant Street, San Francisco, CA 94103</td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="80%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed; max-width: 480px;">
                                             <tbody>
                                                <tr>
                                                   <td align="center">
                                                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;table-layout:fixed;">
                                                         <tbody>
                                                            <tr>
                                                               <td align="center" style="padding: 0 0 36px;">
                                                                  <table align="center" cellspacing="0" border="0" style="width: 62px; max-width: 62px;" width="62">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td align="center" style="-moz-hyphens:none; -webkit-hyphens:none; border-collapse:collapse !important; box-sizing:border-box; padding-right: 5px;" width="31"><a style=" text-align: left; position: relative; box-sizing: border-box; padding: 0;color: #2199e8;" target="_blank" href="">
                                                                              <img width="24" alt="Twitter" style="display: inline-block; outline: 0; border: 0; padding:0; width:24px; max-width:24px;" src="https://d2axdqolvqmdvx.cloudfront.net/604c8d59-bc78-4e5b-9d27-943f3f98e2fe/twitter48px.png"/>
                                                                              </a>
                                                                           </td>
                                                                           <td align="center" style="-moz-hyphens:none; -webkit-hyphens:none; border-collapse:collapse !important; box-sizing:border-box; padding-left: 5px;" width="31"><a style="text-align: left; position: relative; box-sizing: border-box; padding: 0;color: #2199e8;" target="_blank" href=""><img width="24" alt="Facebook" style="display: inline-block; outline: 0; border: 0; padding:0; width:24px; max-width:24px;" src="https://d2axdqolvqmdvx.cloudfront.net/a78f8eb6-8082-4413-bca4-9d1321f0c5ef/facebook48px.png"/>
                                                                              </a>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
               <td style="font-size:0;"></td>
            </tr>
         </tbody>
      </table>
   </body>
</html>