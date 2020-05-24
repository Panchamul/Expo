<?php 
class CodigoRecuperacion{
    private $N1 = null;
    private $N2 = null;
    private $N3 = null;
    private $N4 = null;
    private $N5 = null;
    private $N6 = null;
    private $N7 = null;
    private $N8 = null;
    private $N9 = null;

    public function Aleatorio(){
        $N1 =  mt_rand(0, 9);
        $N2 =  mt_rand(0, 9);
        $N3 =  mt_rand(0, 9);
        $N4 =  mt_rand(0, 9);
        $N5 =  mt_rand(0, 9);
        $N6 =  mt_rand(0, 9);
        $N7 =  mt_rand(0, 9);
        $N8 =  mt_rand(0, 9);
        $N9 =  mt_rand(0, 9);
        $Completo = $N1 . $N2 . $N3 . $N4 . $N5 . $N6 . $N7 . $N8 . $N9;
        return $Completo;
    }

}
?>