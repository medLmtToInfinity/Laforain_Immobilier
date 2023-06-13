<?php
// print_r($_POST);
$toEmail = 'med.lmt012@gmail.com'; 
$from = $_POST['email'];

// // Check if a file was uploaded
// if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
//     $uploadedFile = $_FILES['file'];
//     $filename = $uploadedFile['name'];
//     echo $filename;
//     $fileTmpPath = $uploadedFile['tmp_name'];

//     // Move the uploaded file to a temporary location
//     $tempFilePath = '/path/to/temp/uploads/' . $filename;
//     move_uploaded_file($fileTmpPath, $tempFilePath);

//     // Add the uploaded file as an attachment
//     $attachment = chunk_split(base64_encode(file_get_contents($tempFilePath)));

//     // Headers
//     $headers = "From: $email\r\n";
//     $headers .= "Reply-To: $email\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

//     // Message body
//     $body = "--boundary\r\n";
//     $body .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
//     $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
//     $body .= "Subject: $subject\r\n";
//     $body .= "Email: $email\r\n";
//     $body .= "Message: $message\r\n\r\n";

//     $body .= "--boundary\r\n";
//     $body .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
//     $body .= "Content-Transfer-Encoding: base64\r\n";
//     $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
//     $body .= $attachment."\r\n";

//     $body .= "--boundary--";

//     // Send the email
//     mail($to, $subject, $body, $headers);

//     // Delete the temporary file
//     unlink($tempFilePath);
// } else {
//     // Headers
//     $headers = "From: $email\r\n";
//     $headers .= "Reply-To: $email\r\n";

//     // Message body
//     $body = "Subject: $subject\r\n";
//     $body .= "Email: $email\r\n";
//     $body .= "Message: $message";

//     // Send the email
//     mail($to, $subject, $body, $headers);
// }

// echo "<div
//         style='
//         color: white;
//         position: fixed;
//         top: 50%;
//         left: 50%;
//         transform: translate(-35%, -50%);
//         background-color: rgb(45, 151, 45);
//         padding: 20px;
//         text-align: center;
//         border: 1px solid #ccc;
//         border-radius: 5px;
//         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
//         '
//     >Your message sent successfuly<div>";
//     sleep(3);
//     header('location: contact-us.php');
//     exit();
// Email settings 

$fromName = 'user'; // Sender name 
 
// File upload settings 
$attachmentUploadDir = "attachement-files/"; 
$allowFileTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
 
 
/* Form submission handler code */ 
$postData = $uploadedFile = $statusMsg = $valErr = ''; 
$msgClass = 'errordiv'; 
if(isset($_POST['submit'])){ 
    // Get the submitted form data 
    $postData = $_POST; 
    $email = trim($_POST['email']); 
    $subject = trim($_POST['subject']); 
    $message = trim($_POST['message']); 
 
    // Validate input data 
    
     
    // Check whether submitted data is valid 

        $uploadStatus = 1; 
         
        // Upload attachment file 
        if(!empty($_FILES["file"]["name"])){ 
             
            // File path config 
            $targetDir = $attachmentUploadDir; 
            $fileName = basename($_FILES["file"]["name"]); 
            $targetFilePath = $targetDir . $fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            if(in_array($fileType, $allowFileTypes)){ 
                // Upload file to the server 
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                    $uploadedFile = $targetFilePath; 
                }else{ 
                    $uploadStatus = 0; 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
            }else{ 
                $uploadStatus = 0; 
                $statusMsg = 'Sorry, only '.implode('/', $allowFileTypes).' files are allowed to upload.'; 
            } 
        } 
         
        if($uploadStatus == 1){ 
            // Email subject 
            $emailSubject = 'Contact Request Submitted by '.$name; 
             
            // Email message  
            $htmlContent = '<h2>Contact Request Submitted</h2> 
                <p><b>Name:</b> '.$name.'</p> 
                <p><b>Email:</b> '.$email.'</p> 
                <p><b>Subject:</b> '.$subject.'</p> 
                <p><b>Message:</b><br/>'.$message.'</p>'; 
             
            // Header for sender info 
            $headers = "From: $fromName"." <".$from.">"; 
 
            // Add attachment to email 
            if(!empty($uploadedFile) && file_exists($uploadedFile)){ 
                 
                // Boundary  
                $semi_rand = md5(time());  
                $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
                 
                // Headers for attachment  
                $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
                 
                // Multipart boundary  
                $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
                "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
                 
                // Preparing attachment 
                if(is_file($uploadedFile)){ 
                    $message .= "--{$mime_boundary}\n"; 
                    $fp =    @fopen($uploadedFile,"rb"); 
                    $data =  @fread($fp,filesize($uploadedFile)); 
                    @fclose($fp); 
                    $data = chunk_split(base64_encode($data)); 
                    $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" .  
                    "Content-Description: ".basename($uploadedFile)."\n" . 
                    "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" .  
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
                } 
                 
                $message .= "--{$mime_boundary}--"; 
                $returnpath = "-f" . $email; 
                 
                // Send email 
                $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath); 
                 
                // Delete attachment file from the server 
                @unlink($uploadedFile); 
            }else{ 
                    // Set content-type header for sending HTML email 
                $headers .= "\r\n". "MIME-Version: 1.0"; 
                $headers .= "\r\n". "Content-type:text/html;charset=UTF-8"; 
                 
                // Send email 
                $mail = mail($toEmail, $emailSubject, $htmlContent, $headers);  
            } 
             
            // If mail sent 
            if($mail){ 
                $statusMsg = 'Thanks! Your contact request has been submitted successfully.'; 
                $msgClass = 'succdiv'; 
                 
                $postData = ''; 
            }else{ 
                $statusMsg = 'Failed! Something went wrong, please try again.'; 
            } 
        } 
    }else{ 
        $valErr = !empty($valErr)?'<br/>'.trim($valErr, '<br/>'):''; 
        $statusMsg = 'Please fill all the mandatory fields.'.$valErr; 
    } 
    header("Location: contact-us.php");
?>