<?php

class Usuario {

    private $id;
    private $nombre;
    private $email;
    private $rol;

    private static function fromRowToUsuario($row) {
        return new Usuario($row);
    }

    public static function getUsuariosNormales() {
        $query = "SELECT * FROM usuario WHERE rol_id <> 1";
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute();
        $result = array();
        if($res) {
            $result = $ps->fetchAll();
            $result = array_map([Usuario::class, 'fromRowToUsuario'], $result);
        }

        return $result;
    }

    
    public function getCantidadTareas() {

        
        $tareas = array();
        $tareas = Tarea::getAllUserTareas($this);
        $cantidad = count($tareas);

        return $cantidad;

      
    }

    public function esAdministrador() {

        $rol = $this->getRol();

        if($rol==1)
        {
            return true;
        }
    }

    function __construct($result_row) {
        $this->id     = $result_row["usuario_id"];
        $this->nombre = $result_row["nombre"];
        $this->email  = $result_row["email"];
        $this->rol    = $result_row["rol_id"];        
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRol() {
        return $this->rol;
    }

    public static function findByUsername($username) {
        $query = "SELECT * FROM usuario WHERE nombre = ?";
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array($username));        
        
        $result = null;
        if($res) {
            $userRow = $ps->fetch();
            if($userRow) {
                $result = new Usuario($userRow);
            }
        } 

        return $result;
    }
}

?>