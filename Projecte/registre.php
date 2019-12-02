<?php


class crearUsuari{

    private $cont = 0;
    private $cont_usuari = 0;
    private $cont_contrasenya = 0;

    public function comprovarContrasenya($contrasenya){
        if (ctype_alnum ( $contrasenya )){
            if (strlen($contrasenya)>=6){
                $this->cont_contrasenya = 1;
                return "";

            }
            else{
                return "La contrasenya no es prou llarga, es necesari 6 caracters minim, fes <a href=\"registre.html\">click aqui</a> per tornar a provar.";
            }
        }
        else{
            return "La contrasenya no es alfanumerica, fes <a href=\"registre.html\">click aqui</a> per tornar a provar.";
        }
    }

    public function existeixUsuari($paraula, $fitxer){
        if ($this->cont_contrasenya==1){
            foreach ($paraula as $cadena) { //Linea agafa la posicio de la linea i cadena el valor de la linea
                if ($this->cont % 2 == 0) {
                    if ($cadena == $_POST["usuari"]) {
                        //echo "usuari: $cadena<br>";
                        $this->cont_usuari = 1;
                        //echo "usuari bona: $cadena<br>";
                    }
                }

                $this->cont++;
            }

            if ($this->cont_usuari == 1) {
                ?>
            El nom de usuari ja existeix, fes <a href="registre.html">click aqui</a> i torna a provar canviant el nom de usuari.
            <?php
            }
        }

    }

    public function UsuariCorrecte(){
        if ($this->cont_contrasenya==1){
            if ($this->cont_usuari != 1) {
                $filename = "./users";
                $fitxer = fopen($filename, "a") or die("No s'ha pogut obrir el fitxer");
                fwrite($fitxer, "  " . $_POST["usuari"] . "  " . $_POST["password"]);
                fclose($fitxer);
                session_name("nom");
                session_start();
                $nom=$_POST["usuari"];
                setcookie("email",$nom,time()+3600);
                ?>

            Usuari creat correctament, fes <a href="shop.php">click aqui</a> per anar a la tenda
            <?php
            }
        }
    }

}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
</head>

<body>
    <h1>SHOP</h1>
    <?php
    $filename = "./users";
    $fitxer = fopen($filename, "r") or die("No s'ha pogut obrir el fitxer");
    $mida_fitxer = filesize($filename);
    $paraula = explode("  ", fread($fitxer, $mida_fitxer));
    $user = new crearUsuari();
    $contrasenya = $_POST["password"];
    echo $user ->comprovarContrasenya($contrasenya);
    $user->existeixUsuari($paraula, $fitxer);
    fclose($fitxer);
    $user->UsuariCorrecte();
    

?>
</body>

</html>