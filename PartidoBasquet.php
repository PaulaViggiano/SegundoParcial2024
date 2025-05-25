<?php
    class PartidoBasquet extends Partido{
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $cantInfracciones;
        private $coef_penalizacion;
        
        //METODO CONSTRUCTOR
        public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones)
        {
            parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
            $this -> cantInfracciones = $cantInfracciones;
            $this -> coef_penalizacion = 0.75;
        }

        //METODOS DE ACCESO GETTERS Y SETTERS
    }




?>