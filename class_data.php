<?php
    class Data { 
        var $resultMediana;
        var $dataArray=[];
        var $resultNode;

        
        /**
         * Constructor
         */
        function __construct(){
            
        }
        /**
         * get Data Array
         *
         * @return void
         */
        function getDataArray(){
            return $this->dataArray;
        }
        /**
         * set Data array
         *
         * @param [float] $value
         * @return void
         */
        function setDataArray($value){
            try {
                if(is_numeric($value))
                    array_push($this->dataArray,(float)$value);
            } catch (\Throwable $th) {
                echo 'Error '.$th;
            }
        }

        /**
         * This method removes the value into the array.
         *
         * @param [float] $value
         * @return [String] if data exists return the median else return Wrong! 
         */
        function removeDataArray($value){
            if (($key = array_search($value, $this->dataArray)) !== false) {
                unset($this->dataArray[$key]);
                echo ($this->getMedian().'<br>');
            }else{
                echo 'Wrong!<br>';
            }
        }

        /**
         * This method clear the array
         *
         * @return void
         */
        function clearDataArray(){
            $this->dataArray=[];
        }

        /**
         * This method calculates the median into the array
         *
         * @return Object 
         */
        function getMedian(){
            $count = count($this->dataArray);
            if($count>0){
                sort($this->dataArray);
                $mid = floor(($count-1)/2);
                return round(($this->dataArray[$mid]+$this->dataArray[$mid+1-$count%2])/2,1);
            }else
             return 'Wrong!';
        }

        function getSumNode(){

        }


    }

?>