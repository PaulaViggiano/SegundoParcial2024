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
        public function getCantInfracciones(){
            return $this -> cantInfracciones;
        }
        public function setCantInfracciones($cantInfracciones){
            $this -> cantInfracciones = $cantInfracciones;
        }
        public function getCoef_penalizacion(){
            return $this -> coef_penalizacion;
        }
        public function setCoef_penalizacion($coef_penalizacion){
            $this -> coef_penalizacion = $coef_penalizacion;
        }

        //METODO TOSTRING
        public function __toString()        {
            $mensaje = parent::__toString();
            $mensaje .= "Cantidad de infracciones: " . $this -> getCantInfracciones() . "\n";   
            $mensaje .= "Coeficiente de penalizacion: " . $this -> getCoef_penalizacion() . "\n";
            return $mensaje;
        }


        /** Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones 
         * de manera tal que al coeficiente base se debe restar un coeficiente de penalización, 
         * cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
         * coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);  
        */
        public function coeficienteBase()  {
            $base = parent::coeficienteBase();
            $penalizacion = $this -> getCoef_penalizacion();//Penalizacion
            $infracciones = $this -> getCantInfracciones();

            $coeficiente = $base - ($penalizacion * $infracciones);

            return $coeficiente;

        }

    }




?>