<?php
    class Ejercicio2 {
        var $edges;
        var $color;
        function __construct($color){
            $this->color = str_replace("\n", "", $color);
            $this->edges = array();
        }
        function addEdge($node){
            array_push($this->edges, $node);
        }
        function checkEdge($node){
            for($i=0; $i<count($this->edges); $i++){
                if($this->edges[$i]==$node){
                    return $i;
                }
            }
            return null;
        }
        function tryAllEdges($node, $nodes_tried){ 
            global $nodes;
            $nt = $nodes_tried;
            
            
            $n=$this->checkEdge($node);
            
            if(!is_null($n)){ 
            
                $ret = array();
            
                array_push($ret, $nodes[$this->edges[$n]]->color);
                array_push($ret, $this->color);
            
                return $ret;
            } else {
                for($i=0; $i<count($this->edges); $i++){
                    if(!in_array($this->edges[$i],$nt)){
                        array_push($nt, $this->edges[$i]);
                        if(!is_null(($r=$nodes[$this->edges[$i]]->tryAllEdges($node, $nt)))){
                            $ret = $r;
                            array_push($ret, $this->color);
                            return $ret;
                        }    
                    }
                }
                return null; 
            }
        }
    }
    

?>