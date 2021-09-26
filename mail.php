<?php

// if (isset($_POST['name'])) $name = $_POST['name'];
// if (isset($_POST['email'])) $email = $_POST['email'];
// if (isset($_POST['message'])) $message = $_POST['message'];
// if (isset($_POST['subject'])) $subject = $_POST['subject'];

// $content = "From : $name \n Email : $email \n Message = $message";
// $recipient = "abufahmi08@gmail.com";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $content, $mailheader) or die("Some errors occur");
// echo "Email sent!";

$notify = '';
$notifyClass = '';

if (isset($_POST["submit"])) {
    // Membuat variabl untuk menerima data dari form
    if (isset($_POST['name'])) $name = $_POST['name'];
    if (isset($_POST['email'])) $email = $_POST['email'];
    if (isset($_POST['message'])) $message = $_POST['message'];
    if (isset($_POST['subject'])) $subject = $_POST['subject'];
}

// Cek apakah ada data yang belum diisi
if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $notify = "Email Anda salah. Silakan ketikan alamat email yang benar.";
        $notifyClass = "errordiv";
    } else {
        // Pengaturan penerima email dan subjek email
        $recipient = "abufahmi08@gmail.com";
        $emailsubject = "Pesan website dari $name";
        $content = "<h2>FORM KONTAK WEBSITE</h2>
    <h4>Nama</h4><p>$name</p>
    <h4>Email</h4><p>$email</p>
    <h4>Subject</h4><p>$subject</p>
    <h4>Message</h4><p>$$message</p>";

        // Mengatur Content-Type header untuk mengirim email dalam bentuk HTML
        $header = "MIME Version: 1.0 \r\n";
        $header .= "Content-type:text/html; charset=UTF-8 \r\n";
        $header .= "From $name <$email> \r\n";

        // Send Mail
        if (mail($recipient, $emailsubject, $content, $header)) {
            $notify = "Email telah terkirim";
            $notifyClass = "succdiv";
        } else {
            $notify = "Email gagal terkirim";
            $notifyClass = "errordiv";
        }
    }
} else {
    $notify = "Mohon isi semua kolom pada form..";
    $notifyClass = "errordiv";
}
