<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

header('Content-Type: application/json');

// Variabel untuk status dan pesan
$response = array(
    'status' => '',
    'message' => ''
);

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $message = $_POST['message'];

    $mail = new PHPMailer(true); 

    try {
        // Set up SMTP server
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cybercoin32@gmail.com'; 
        $mail->Password = 'yywp vhyo rcem lcyv'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('cybercoin32@gmail.com', 'Donasi Bersama'); 
        $mail->addAddress($email, $name); 
        
        $mail->isHTML(true);
        $mail->Subject = 'Terima Kasih Telah Menghubungi Kami';
        $mail->Body = "<strong>Nama:</strong> $name<br><strong>Email:</strong> $email<br><strong>Pesan:</strong> $message";

        // Kirim balasan
        $mail->send();
        
        // Response untuk AJAX
        $response['status'] = 'success';
        $response['message'] = 'Pesan Anda telah berhasil dikirim.';
        
    } catch (Exception $e) {
        // Response untuk AJAX dengan error
        $response['status'] = 'error';
        $response['message'] = "Pesan gagal dikirim: " . $mail->ErrorInfo;
    }
    
    // Kirim response dalam format JSON
    echo json_encode($response);
}
?>