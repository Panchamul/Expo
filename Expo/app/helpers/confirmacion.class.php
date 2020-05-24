<?php 
class Confirmacion{
    private $numero = null;
    
    public function Aleatorio($n){
        
        switch($n){
            case 1: 
                $numero =  mt_rand(1, 12);
                return $numero;
            break;
            case 2: 
                $numero =  mt_rand(13, 24);
                return $numero;
            break;
            case 3: 
                $numero =  mt_rand(25, 36);
                return $numero;
            break;
        }
    }
    
    public function ConfirmacionEscrita($n){
        $confirma;
        switch($n){
            case 1: 
                $confirma = "Perro";
                return $confirma;
            break;
            case 2: 
                $confirma = "Gato";
                return $confirma;
            break;
            case 3: 
                $confirma = "Perico";
                return $confirma;
            break;
            case 4: 
                $confirma = "Carro";
                return $confirma;
            break;
            case 5: 
                $confirma = "Moto";
                return $confirma;
            break;
            case 6: 
                $confirma = "Camión";
                return $confirma;
            break;
            case 7: 
                $confirma = "Suma";
                return $confirma;
            break;
            case 8: 
                $confirma = "Resta";
                return $confirma;
            break;
            case 9: 
                $confirma = "División";
                return $confirma;
            break;
            case 10: 
                $confirma = "Multiplicación";
                return $confirma;
            break;
            case 11: 
                $confirma = "Rojo";
                return $confirma;
            break;
            case 12: 
                $confirma = "Negro";
                return $confirma;
            break;
            case 13: 
                $confirma = "Blanco";
                return $confirma;
            break;
            case 14: 
                $confirma = "Verde";
                return $confirma;
            break;
            case 15: 
                $confirma = "Amarillo";
                return $confirma;
            break;
            case 16: 
                $confirma = "Hamburgesa";
                return $confirma;
            break;
            case 17: 
                $confirma = "Pizza";
                return $confirma;
            break;
            case 18: 
                $confirma = "Sandwich";
                return $confirma;
            break;
            case 19: 
                $confirma = "Helado";
                return $confirma;
            break;
            case 20: 
                $confirma = "Licuado";
                return $confirma;
            break;
            case 21: 
                $confirma = "Tierra";
                return $confirma;
            break;
            case 22: 
                $confirma = "Agua";
                return $confirma;
            break;
            case 23: 
                $confirma = "Fuego";
                return $confirma;
            break;
            case 24: 
                $confirma = "Aire";
                return $confirma;
            break;
            case 25: 
                $confirma = "Hielo";
                return $confirma;
            break;
            case 26: 
                $confirma = "Mesa";
                return $confirma;
            break;
            case 27: 
                $confirma = "Silla";
                return $confirma;
            break;
            case 28: 
                $confirma = "Sofa";
                return $confirma;
            break;
            case 29: 
                $confirma = "Televisión";
                return $confirma;
            break;
            case 30: 
                $confirma = "Licuadora";
                return $confirma;
            break;
            case 31: 
                $confirma = "Zapato";
                return $confirma;
            break;
            case 32: 
                $confirma = "Camisa";
                return $confirma;
            break;
            case 33: 
                $confirma = "Pantalón";
                return $confirma;
            break;
            case 34: 
                $confirma = "Pants";
                return $confirma;
            break;
            case 35: 
                $confirma = "Pulsera";
                return $confirma;
            break;
            case 36: 
                $confirma = "Tijera";
                return $confirma;
            break;
        }
    }
    

}
?>