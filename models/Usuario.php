<?php
    class Usuario extends Conectar {
        public function login() {
            $conectar = parent::conexion();
            parent::set_names();
            if (isset($_POST["enviar"])) {
                $correo = $_POST["correo"];
                $password = $_POST["password"];
                if (empty($correo) and empty($password)) {
                    header("Location: " . Conectar::ruta() . "index.php?m=2");
                    exit();
                }else{
                    $sql="SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and rol_id = 2";
                    $sql=$conectar->prepare($sql);
                    $sql->bindValue(1,$correo);
                    $sql->bindValue(2,$password);
                    $sql->execute();
                    $resultado=$sql->fetch();
                    if(is_array($resultado)==true and count($resultado)>0){
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nom"]=$resultado["usu_nom"];
                        $_SESSION["usu_apep"]=$resultado["usu_apep"];
                        $_SESSION["usu_apem"]=$resultado["usu_apem"];
                        $_SESSION["usu_correo"]=$resultado["usu_correo"];
                        header("Location: " . Conectar::ruta() . "view/home/");
                        exit();
                    }else{
                        header("Location: " . Conectar::ruta() . "index.php?m=1");
                        exit();
                    }
                }
            }
        }

        public function get_usuario(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario WHERE rol_id=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    est=0
                WHERE
                    usu_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>