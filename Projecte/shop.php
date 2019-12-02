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
            <form action="" method="post">
                <input type="submit" value="Tanca la sessio" name="Tancar_sessio" />
            </form>
        
    </nav>
    <?php
if($_COOKIE['email']){

    if (isset($_POST["Tancar_sessio"])){
        unset($_SESSION['nom']);
        session_unset();
        session_destroy();
        setcookie('email',null,0);
        echo "Heu sortit de la sessio<br><br>\n";
        echo "<a href=index.html>Torneu a l'inici</a>\n";
        print '<META HTTP-EQUIV="refresh" CONTENT="1;URL=./index.html">';
    }


    if (!isset($_POST["mouse"])){
        ?>
    <table>
        <form action="http://localhost/Projecte/shop.php" method="POST">
        <tr>
            <h2>PRODUCTES</h2>
        </tr>
        <tr>
            <td><img src="img/mouse.jpg"></td>            
            <td><b>Destroyer FlexWeight Mouse</b><br><br>El Sandberg Destroyer FlexWeight Mouse te permite decidir
                cuánto tiene que pesar tu ratón. La velocidad a la que puedes mover el ratón es esencial</td>
            <td>23€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="mouse" min=0 value=0></td>

        </tr><br><br><br><br><br>

        <tr>
            <td><img src="img/portatil.jpg"></td>  
            <td><b>Portatil Lenovo</b><br><br>Portátil - Lenovo Ideapad 330-17AST, 17.3 HD+", AMD A4-9125, 4 GB RAM, 1
                TB HDD, AMD Radeon R3 Graphics, W10</td>
            <td>399€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="portatil" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/memoria_usb.jpg"></td>  
            <td><b>Memoria USB Sandisk</b><br><br>Memoria USB 64 GB - Sandisk 139789 Ultra Flair, USB 3.0, Velocidad
                hasta 150mb/sg</td>
            <td>16,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="usb" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/disco_duro_externo.png"></td>  
            <td><b>Disco Duro Externo WD</b><br><br>Disco duro de 1 TB - WD Elements, 2,5 pulgadas, 3 años de garantia
            </td>
            <td>57,90€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="disco_duro" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/monitor.png"></td>  
            <td><b>Monitor 27"</b><br><br>Monitor - HP 27F, 27" FHD, IPS, Micro-borde, Antireflectante, Ultradelgada,
                HDMI, VGA, 5 ms</td>
            <td>176€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="monitor" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/impresora.png"></td>  
            <td><b>Impresora Epson</b><br><br>Impresora multifunción - Epson EcoTank ET-2600, Wifi, 3 en 1, Tinta por
                inyección</td>
            <td>159€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="impresora" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/tablet.png"></td>  
            <td><b>Tablet</b><br><br>Tablet - Huawei Mediapad T5, 10.1 Full HD, 3 GB RAM, 32 GB, WiFi, Negro</td>
            <td>179€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="tablet" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/torre.png"></td>  
            <td><b>Carcasa Ordenador</b><br><br>Carcasa de ordenador - Sharkoon VG5-V Midi-Tower, Negro</td>
            <td>31,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="torre" min=0 value=0></td>

        </tr>


        <tr>
            <td><img src="img/alfombrilla.png"></td>  
            <td><b>Alfombrilla Negra</b><br><br></td>
            <td>1,19€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="alfombrilla" min=0 value=0></td>

        </tr>

        <tr>
            <td><img src="img/cable_hdmi.png"></td>  
            <td><b>Cable HDMI</b><br><br>Cable HDMI - Hama 00056586, 1.5 M, HDMI Tipo A, Negro</td>
            <td>9,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="cable" min=0 value=0></td>

        </tr>
    </table>
    <input id="cesta" type="image" name="cesta" src="img/cesta.png">
    </form>
    <?php
       }
       else{
        $preu_total=($_POST["mouse"]*23)+($_POST["portatil"]*399)+($_POST["usb"]*16.99)+($_POST["disco_duro"]*57.99)+($_POST["monitor"]*176)+($_POST["impresora"]*159)+($_POST["tablet"]*179)+($_POST["torre"]*31.99)+($_POST["alfombrilla"]*1.19)+($_POST["cable"]*9.99);
        if ($preu_total!=0){
            $filename = "./comanda";
            $fitxer = fopen($filename, "w") or die("No s'ha pogut obrir el fitxer\n");
            fwrite($fitxer, "Producte                   Quantitat          Preu\n");
        }
        ?>
        <form action="http://localhost/Projecte/shop.php" method="POST">
        <table>
            <tr>
            <h2>PRODUCTES</h2>
        </tr>
        <tr>
            <td><img src="img/mouse.jpg"></td>  
            <td><b>Destroyer FlexWeight Mouse</b><br><br>El Sandberg Destroyer FlexWeight Mouse te permite decidir
                cuánto tiene que pesar tu ratón. La velocidad a la que puedes mover el ratón es esencial</td>
            <td>23€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="mouse" min=0 value="<?php echo $_POST["mouse"]; ?>"></td>

        </tr><br><br><br><br><br>

        <tr>
            <td><img src="img/portatil.jpg"></td>  
            <td><b>Portatil Lenovo</b><br><br>Portátil - Lenovo Ideapad 330-17AST, 17.3 HD+", AMD A4-9125, 4 GB RAM, 1
                TB HDD, AMD Radeon R3 Graphics, W10</td>
            <td>399€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="portatil" min=0 value="<?php echo $_POST["portatil"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/memoria_usb.jpg"></td> 
            <td><b>Memoria USB Sandisk</b><br><br>Memoria USB 64 GB - Sandisk 139789 Ultra Flair, USB 3.0, Velocidad
                hasta 150mb/sg</td>
            <td>16,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="usb" min=0 value="<?php echo $_POST["usb"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/disco_duro_externo.png"></td>  
            <td><b>Disco Duro Externo WD</b><br><br>Disco duro de 1 TB - WD Elements, 2,5 pulgadas, 3 años de garantia
            </td>
            <td>57,90€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="disco_duro" min=0 value="<?php echo $_POST["disco_duro"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/monitor.png"></td>  
            <td><b>Monitor 27"</b><br><br>Monitor - HP 27F, 27" FHD, IPS, Micro-borde, Antireflectante, Ultradelgada,
                HDMI, VGA, 5 ms</td>
            <td>176€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="monitor" min=0 value="<?php echo $_POST["monitor"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/impresora.png"></td>  
            <td><b>Impresora Epson</b><br><br>Impresora multifunción - Epson EcoTank ET-2600, Wifi, 3 en 1, Tinta por
                inyección</td>
            <td>159€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="impresora" min=0 value="<?php echo $_POST["impresora"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/tablet.png"></td>  
            <td><b>Tablet</b><br><br>Tablet - Huawei Mediapad T5, 10.1 Full HD, 3 GB RAM, 32 GB, WiFi, Negro</td>
            <td>179€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="tablet" min=0 value="<?php echo $_POST["tablet"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/torre.png"></td>  
            <td><b>Carcasa Ordenador</b><br><br>Carcasa de ordenador - Sharkoon VG5-V Midi-Tower, Negro</td>
            <td>31,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="torre" min=0 value="<?php echo $_POST["torre"]; ?>"></td>

        </tr>


        <tr>
            <td><img src="img/alfombrilla.png"></td>  
            <td><b>Alfombrilla Negra</b><br><br></td>
            <td>1,19€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="alfombrilla" min=0 value="<?php echo $_POST["alfombrilla"]; ?>"></td>

        </tr>

        <tr>
            <td><img src="img/cable_hdmi.png"></td>  
            <td><b>Cable HDMI</b><br><br>Cable HDMI - Hama 00056586, 1.5 M, HDMI Tipo A, Negro</td>
            <td>9,99€</td>
            <td>Cantidad<br><br>
                <input type="NUMBER" name="cable" min=0 value="<?php echo $_POST["cable"]; ?>"></td>

        </tr>
        </table>
        <input type="submit" value="Actualitza"/>
        </form>
        <?php
        
        $price=$_POST["mouse"]*23;
        if ($price!=0){
            echo "Mouse: quantitat:".$_POST["mouse"]." preu total:".$price."€<br>";
            fwrite($fitxer, "Mouse                       ". $_POST["mouse"] . "                 " .$price."€\n");
        }
        $price=$_POST["portatil"]*399;
        if ($price!=0){
            echo "Portatil: quantitat:".$_POST["portatil"]." preu total:".$price."€<br>";
            fwrite($fitxer, "Portatil                    ". $_POST["portatil"] . "                 " .$price."€\n");
        }
        $price=$_POST["usb"]*16.99;
        if ($price!=0){
            echo "USB: quantitat:".$_POST["usb"]." preu total:".$price."€<br>";
            fwrite($fitxer, "USB                         ". $_POST["usb"] . "                 " .$price."€\n");
        }
         $price=$_POST["disco_duro"]*57.99;
        if ($price!=0){
            echo "Disco Duro: quantitat:".$_POST["disco_duro"]." preu total:".$price."€<br>";
            fwrite($fitxer, "DISCO DURO                  ". $_POST["disco_duro"] . "                 " .$price."€\n");
		}
         $price=$_POST["monitor"]*176;
        if ($price!=0){
            echo "Monitor: quantitat:".$_POST["monitor"]." preu total:".$price."€<br>";
            fwrite($fitxer, "MONITOR                     ". $_POST["monitor"] . "                 " .$price."€\n");
		}
        $price=$_POST["impresora"]*159;
        if ($price!=0){
            echo "Impresora: quantitat:".$_POST["impresora"]." preu total:".$price."€<br>";
            fwrite($fitxer, "IMPRESORA                   ". $_POST["impresora"] . "                 " .$price."€\n");
		}
        $price=$_POST["tablet"]*179;
        if ($price!=0){
            echo "Tablet: quantitat:".$_POST["tablet"]." preu total:".$price."€<br>";
            fwrite($fitxer, "TABLET                      ". $_POST["tablet"] . "                 " .$price."€\n");
		}
        $price=$_POST["torre"]*31.99;
        if ($price!=0){
            echo "Tablet: quantitat:".$_POST["torre"]." preu total:".$price."€<br>";
            fwrite($fitxer, "TORRE                       ". $_POST["torre"] . "                 " .$price."€\n");
		}
        $price=$_POST["alfombrilla"]*1.19;
        if ($price!=0){
            echo "Alfombrilla: quantitat:".$_POST["alfombrilla"]." preu total:".$price."€<br>";
            fwrite($fitxer, "ALFOMBRILLA                 ". $_POST["alfombrilla"] . "                 " .$price."€\n");
		}
         $price=$_POST["cable"]*9.99;
        if ($price!=0){
            echo "Cable: quantitat:".$_POST["cable"]." preu total:".$price."€<br>";

            fwrite($fitxer, "CABLE                       ". $_POST["cable"] . "                 " .$price."€\n");
		}
        
        
        

        if ($preu_total!=0){
            fwrite($fitxer, "------------------------------------------------------\n");
            fwrite($fitxer, "Preu total                                    ".$preu_total."€\n");
            fclose($fitxer);
            echo "<a href='comanda' download='comanda.txt'>Descarregar cistella</a>";
        }    
    }
}else{
    echo "Heu de iniciar sessio per poder entrar a aquesta paguina web.\n <a href=index.html>Torneu-ho a intentar</a>\n";
	print '<META HTTP-EQUIV="refresh" CONTENT="3;URL=./index.html">';
}
    ?>

</body>

</html>