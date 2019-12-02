<?php


class comprovaUsuari{
    private $cont_usuari = 0;
    private $cont_password = 0;

    public function comprovarContrasenya($contrasenya, $paraula){
        if (ctype_alnum ( $contrasenya )){
            if (strlen($contrasenya)>=6){

                return ($this->comprovarUsuari($paraula));
            }
            else{
                return "La contrasenya no es prou llarga, es necesari 6 caracters minim, fes <a href=\"index.html\">click aqui</a> per tornar a provar.";
            }
        }
        else{
            return "La contrasenya no es alfanumerica, fes <a href=\"index.html\">click aqui</a> per tornar a provar.";
        }
    }
    private function comprovarUsuari($paraula){
            $cont = 0;
            foreach ($paraula as $cadena_paraula) { //Linea agafa la posicio de la linea i cadena el valor de la linea
                if ($cont % 2 == 0) {
                    if ($cadena_paraula == $_POST["usuari"]) {
                        $this->cont_usuari = 1;
                    }
                } 
                else {
                    if ($this->cont_usuari == 1) {
                        if ($cadena_paraula == $_POST["password"]) {
                            $this->cont_password = 1;
                        }
                    }
                }

                $cont++;
            }
        return ($this->resultat());
    }

    private function resultat(){

        if ($this->cont_usuari + $this->cont_password == 2) {
            session_name("nom");
            session_start();
            $nom=$_POST["usuari"];
            setcookie("email",$nom,time()+3600);
            return "Login correcte, per entrar a la tenda fes <a href=\"shop.php\">click aqui</a>";
        } 
        else {
            return "Usuari o password incorrecte, fes <a href=\"index.html\">click aqui</a> per tornar a provar.";

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
    if (isset($_POST["usuari"])){
        $user = new comprovaUsuari();
        $contrasenya=$_POST["password"];

        $filename = "./users";
        $fitxer = fopen($filename, "r") or die("No s'ha pogut obrir el fitxer");
        $mida_fitxer = filesize($filename);
        $paraula = explode("  ", fread($fitxer, $mida_fitxer));
        echo $user->comprovarContrasenya($contrasenya, $paraula);
        fclose($fitxer);
    }
    else{
        echo "Has de iniciar sessio abans de entrar a la tenda";
    }
?>
</body>

</html>