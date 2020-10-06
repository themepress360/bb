<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\EmailSetting as EmailSetting;
use Session;

class EmailController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
            $mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "themepress360@gmail.com", "Master@81");

             $unread = imap_search($mbox,'UNSEEN');

            // $flagged = imap_search($mbox,'FLAGGED');

            // dd($flagged);

              return view('admin.apps.email.index', compact('unread'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMessage($id)
    {
        
        $mail_id = $id;

        $mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "themepress360@gmail.com", "Master@81");

        $mailBody = imap_fetchbody($mbox, $mail_id, 1.1);

        // $messageBody = preg_replace('/[\r\n]/sm', '', $mailBody);

        $messageBody = $mailBody;
        //dd($messageBody);

        if($mailBody == "" ){

           $mailBody = imap_fetchbody($mbox, $mail_id, 2);

           $messageBody = (quoted_printable_decode($mailBody));

           // dd($messageBody);

            if($mailBody == ""){

               $html = imap_fetchbody($mbox, $mail_id, 1);

               $messagebody = (quoted_printable_decode($html));

               $messageBody = preg_replace('/[\r\n]/sm', '', $messagebody);

             //  dd($messageBody);
          }


        }


          
      
       //dd(preg_replace('/[\r\n]/sm', '"', $html));

        $headers = imap_headerinfo($mbox, $mail_id);

        //dd(imap_utf8($headers->subject));

        $unread = imap_search($mbox,'UNSEEN');
        
              // Attachments
      $mailStruct = imap_fetchstructure($mbox, $mail_id);

     //  dd($mailStruct);
      
     // $attachments = $this->getAttachments($mbox, $mail_id, $mailStruct, "");
       $attachments = $this->getAttachments($mailStruct,$mbox, $mail_id);

      //dd($attachments);

       //dd(sizeof($attachments));

        return view ('admin.apps.email.mail-view', compact('messageBody', 'headers', 'attachments' , 'unread'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function getAttachments($structure,$inbox, $email_number) {
    
        $attachments = array();

        /* if any attachments found... */
        if(isset($structure->parts) && count($structure->parts)) 
        {
            for($i = 0; $i < count($structure->parts); $i++) 
            {
                $attachments[$i] = array(
                    'is_attachment' => false,
                    'filename' => '',
                    'name' => '',
                    'attachment' => ''
                );

                if($structure->parts[$i]->ifdparameters) 
                {
                    foreach($structure->parts[$i]->dparameters as $object) 
                    {
                        if(strtolower($object->attribute) == 'filename') 
                        {
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['filename'] = $object->value;
                        }
                    }
                }

                if($structure->parts[$i]->ifparameters) 
                {
                    foreach($structure->parts[$i]->parameters as $object) 
                    {
                        if(strtolower($object->attribute) == 'name') 
                        {
                            $attachments[$i]['is_attachment'] = true;
                            $attachments[$i]['name'] = $object->value;
                        }
                    }
                }

                if($attachments[$i]['is_attachment']) 
                {
                    $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);

                    /* 3 = BASE64 encoding */
                    if($structure->parts[$i]->encoding == 3) 
                    { 
                        $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                    }
                    /* 4 = QUOTED-PRINTABLE encoding */
                    elseif($structure->parts[$i]->encoding == 4) 
                    { 
                        $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                    }
                }

            }

            return $attachments;
        }

        /* iterate through each attachment and save it */
        foreach($attachments as $attachment)
        {
            if($attachment['is_attachment'] == 1)
            {
                $filename = $attachment['name'];
                if(empty($filename)) $filename = $attachment['filename'];

                if(empty($filename)) $filename = time() . ".dat";
                $folder = $email_number;
                if(!is_dir($folder))
                {
                     mkdir($folder);
                }
                $fp = fopen("./". $folder ."/". $email_number . "-" . $filename, "w+");
                fwrite($fp, $attachment['attachment']);
                fclose($fp);
            }
        }

      
    }

public function listmessages(Request $request){

$totalMessages = Session::get('lastmsgNo');
$showMessages = 10;


$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "themepress360@gmail.com", "Master@81");

$result = array_reverse(imap_fetch_overview($mbox,($totalMessages-$showMessages+1).":".$totalMessages));

return dd($result);
  

}

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
