<?php 
    /**
     * Import class
     */
    require_once 'Ejercicio1.php';
    require_once 'Ejercicio2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRUBANA</title>
</head>
<body>
    <?php
        $data = new Ejercicio1();
        echo '<br>1....<br>';
        var_dump($data->getDataArray());
        echo '<br>Ejemplo 1<br>';
        $data->setDataArray(9);
        $data->setDataArray(2);
        $data->setDataArray(8);
        $data->setDataArray('4');
        $data->setDataArray('1');
        echo 'Media<br>';
        var_dump($data->getMedian());
        echo '<br>Final<br>';
        $data->clearDataArray();
        echo '<br>Ejemplo 2<br>';
        $data->setDataArray(5);
        $data->setDataArray(2);
        $data->setDataArray(10);
        $data->setDataArray('4');
        echo 'Media<br>';
        var_dump($data->getMedian());
        echo '<br>Final<br>';
        $data->clearDataArray();
        echo '<br>Sample Output<br>';
        $data->removeDataArray(1);
        $data->setDataArray(1);
        echo ($data->getMedian().'<br>');
        $data->setDataArray(2);
        echo ($data->getMedian().'<br>');
        $data->setDataArray(1);
        echo ($data->getMedian().'<br>');
        $data->removeDataArray(1);
        $data->removeDataArray(2);
        $data->removeDataArray(1);
        echo '<br>Final<br>';

        echo '<br>2....<br>';
        $n_nodes = 5; 
        echo 'Nodes: '.$n_nodes.'<br>';
        $node_colors = "1 2 3 2 3"; 
        echo 'Colors: '.$node_colors.'<br>';
        echo 'values:';
        echo '<pre>';
        $values = array();
        $values[0] ="1 2" ;
        $values[1] = "2 3";
        $values[2] = "2 4";
        $values[3] = "1 5";
        //$values[4] = "1 5";
        var_dump($values);
        echo '</pre>';
        echo '<br>';
        $colors = explode(" ", $node_colors);
        $nodes = array();
        for($i=0; $i<$n_nodes; $i++){ 
            array_push($nodes, new Ejercicio2($colors[$i]));
        }

        for($i=0; $i<($n_nodes-1); $i++){ 
            $in = explode(" ", $values[$i]);
            $a = $in[0]-1;
            $b = $in[1]-1;
            $nodes[$a]->addEdge($b);
            $nodes[$b]->addEdge($a);
        }
        
        for($i=0; $i<$n_nodes; $i++){
            $sum = 0;
            for($j=0; $j<$n_nodes; $j++){
                if($i==$j){
                    $sum=$sum+1;
                } else {
                    $x = array_unique($nodes[$i]->tryAllEdges($j, array($i)));
                    $sum = $sum + count($x);   
                }
            }
            echo $sum."\n";
        }
    ?>
    <br>
    <p>Omitir esta parte</p>
    <form action="#" method="POST">
        
        <label for="dataType">
            Tipo de movimiento
            <select name="dataType" id="dataType" required>
                <option value="">Seleccione</option>
                <option value="x">X (Añada)</option>
                <option value="r">R (Elimina)</option>
            </select>
        </label>
        <label for="number">
            Número
            <input name="number" id="number" required type="number" placeholder="0.00" step="0.01"  pattern="^\d*(\.\d{0,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
        </label>
        <button type="submit">Procesar</button>
    </form>
</body>
</html>