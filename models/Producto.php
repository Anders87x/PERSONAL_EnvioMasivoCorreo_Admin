<?php
    class Producto extends Conectar {

        public function get_producto(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_producto($prod_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    est=0
                WHERE
                    prod_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_producto_x_id($prod_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE prod_id=? AND est=1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_producto($prod_nom,$prod_precion,$prod_preciod,$prod_url,$prod_img,$prod_cupon,$prod_descrip){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto (prod_id, prod_nom, prod_precion, prod_preciod, prod_url, prod_img, prod_cupon, prod_descrip, fech_crea, fech_modi, fech_elim, est) VALUES (NULL,?,?,?,?,?,?,?, now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_precion);
            $sql->bindValue(3,$prod_preciod);
            $sql->bindValue(4,$prod_url);
            $sql->bindValue(5,$prod_img);
            $sql->bindValue(6,$prod_cupon);
            $sql->bindValue(7,$prod_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_producto($prod_id,$prod_nom,$prod_precion,$prod_preciod,$prod_url,$prod_img,$prod_cupon,$prod_descrip){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    prod_nom=?,
                    prod_precion=?,
                    prod_preciod=?,
                    prod_url=?,
                    prod_img=?,
                    prod_cupon=?,
                    prod_descrip=?,
                    fech_modi=now()
                WHERE
                    prod_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_precion);
            $sql->bindValue(3,$prod_preciod);
            $sql->bindValue(4,$prod_url);
            $sql->bindValue(5,$prod_img);
            $sql->bindValue(6,$prod_cupon);
            $sql->bindValue(7,$prod_descrip);
            $sql->bindValue(8,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>