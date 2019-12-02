<?php
session_start();
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
    <title>SHOP</title>
</head>

<body>
    <nav class="navbar">
        <a href="index.html">Tornar al index</a>
        
    </nav>
    <?php
    if (!isset($_POST["mouse"])){
        ?>
    <form action="http://localhost/Projecte/shop_prueba.php" method="POST">
        mouse
        <input type="NUMBER" name="mouse" min=0 value=0></td>
        portatil
        <input type="NUMBER" name="portatil" min=0 value=0></td>
        usb
        <input type="NUMBER" name="usb" min=0 value=0></td>
        <input type="submit" value="Envia"/>
    </form>
    <?php
    }
    else{
        $preu_total=($_POST["mouse"]*23)+($_POST["portatil"]*399)+($_POST["usb"]*16.99);
        if ($preu_total!=0){
            $filename = "./comanda";
            $fitxer = fopen($filename, "w") or die("No s'ha pogut obrir el fitxer\n");
            fwrite($fitxer, "Producte                   Quantitat          Preu\n");
        }
        ?>
        <form action="http://localhost/Projecte/shop_prueba.php" method="POST">
            mouse
            <input type="NUMBER" name="mouse" min=0 value="<?php echo $_POST["mouse"]; ?>"></td>
            portatil
            <input type="NUMBER" name="portatil" min=0 value="<?php echo $_POST["portatil"]; ?>"></td>
            usb
            <input type="NUMBER" name="usb" min=0 value="<?php echo $_POST["usb"]; ?>"></td>
            <input type="submit" value="Actualitza"/>
        </form>
        <?php
        
        $price=$_POST["mouse"]*23;
        if ($price!=0){
            echo "mouse: quantitat:".$_POST["mouse"]." preu total:".$price."<br>";
            fwrite($fitxer, "Mouse                       ". $_POST["mouse"] . "                 " .$price."\n");
        }
        $price=$_POST["portatil"]*399;
        if ($price!=0){
            echo "portatil: quantitat:".$_POST["portatil"]." preu total:".$price."<br>";
            fwrite($fitxer, "Portatil                    ". $_POST["portatil"] . "                 " .$price."\n");
        }
        $price=$_POST["usb"]*16.99;
        if ($price!=0){
            echo "usb: quantitat:".$_POST["usb"]." preu total:".$price."<br>";
            fwrite($fitxer, "USB                         ". $_POST["usb"] . "                 " .$price."\n");
        }

        if ($preu_total!=0){
            fwrite($fitxer, "---------------------------------------------------\n");
            fwrite($fitxer, "Preu total                                    ".$preu_total."\n");
            fclose($fitxer);
        }    
    }
    ?>

</body>

</html>