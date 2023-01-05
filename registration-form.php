<?php
    
    $name = $_POST['name'];
    $mailfrom = $_POST['email'];
    $from = "info@from.com";
    $subject = "New Registration from " . $name;
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    
    $headers ="From: Contact Form <$from>\n";
    $headers.="MIME-Version: 1.0\n";
    $headers.="Content-type: text/html; charset=iso 8859-1";
    
    ob_start();
    ?>
        Hi There!<br /><br />
        <?php echo ucfirst( $name ); ?>  has submitted a project!
        <br /><br />
        
        Name: <?php echo ucfirst( $name ); ?><br />
        Email: <?php echo $mailfrom; ?><br />
        Subject: <?php echo $subject; ?><br />
        Phone: <?php echo $phone; ?><br />
        City: <?php echo $city; ?>
        <br />
        <br />
        ============================================================
    <?php
    $body = ob_get_contents();
    ob_end_clean();
    
    $to = 'to@gmail.com';

    $s = mail($to,$subject,$body,$headers,"-t -i -f $from");

    if( $s == 1 ){
        echo '<div class="alert alert-success" role="alert"> Your message has been sent successfully.</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">Your message sending failed!</div>';
    }
?>