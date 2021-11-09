<?php
/*
$retour = mail($_email['mail'], 'Envoi depuis la page Contact', $_POST['message'], 'From : mehdi.birembaut@gmail.com');
if ($retour) {
    echo '<p>Votre message a bien été envoyé.</p>';
}
else echo '<p>Votre message n\'a pas été envoyé</p>';*/
/*
    // S'il y des données de postées
    if ($_SERVER['REQUEST_METHOD']=='POST') {
     
      // (1) Code PHP pour traiter l'envoi de l'email
     
      // Récupération des variables et sécurisation des données
      // htmlentities() convertit des caractères "spéciaux" en équivalent HTML

      $mail = htmlentities($_POST['mail']);
      $message = htmlentities($_POST['message']);
     
      // Variables concernant l'email
     
      $destinataire = 'mehdi.birembaut.foreach@gmail.com'; // Adresse email du webmaster (à personnaliser)
      $contenu = '<p>Tu as un nouveau message !</p>';
      $contenu .= '<p><strong>Email</strong>: '.$mail.'</p>';
      $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
     
      // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
      $headers = 'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
     
      // Envoyer l'email
      mail($destinataire, $contenu, $headers); // Fonction principale qui envoi l'email
      header("location:alert1.html"); // Afficher un message pour indiquer que le message a été envoyé
      // (2) Fin du code pour traiter l'envoi de l'email
    }*/


    if(isset($_POST['submit'])){
        $to = "mehdi.birembaut.foreach@gmail.com"; // this is your Email address
        $from = $_POST['mail']; // this is the sender's Email address
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = "Wrote the following:" . "\n\n" . $_POST['message'];
        $message2 = "Here is a copy of your message " . "\n\n" . $_POST['message'];
    
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        echo "Mail Sent. Thank you" . ", we will contact you shortly.";
        header("location:alert1.html");
        // You can also use header('Location: thank_you.php'); to redirect to another page.
        // You cannot use header and echo together. It's one or the other.
    }
    else header("location:alert.html");


?>