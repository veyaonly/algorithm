<?php 
/*
*   封装一个类
*/
    Algorithm::index();

    class Algorithm{
        public static function index(){
            echo '<h3>冒泡排序</h3>';
            $arr = self::set_data(21);
            echo '初始化数组:' . self::to_string($arr) . '</br>';
            echo '排序后数组:' . self::to_string(self::bubble_sort($arr));

            echo '<h3>选择排序</h3>';
            $arr = self::set_data(21);
            echo '初始化数组:' . self::to_string($arr) . '</br>';
            echo '排序后数组:' . self::to_string(self::selection_sort($arr));
            
            echo '<h3>插入排序</h3>';
            $arr = self::set_data(21);
            echo '初始化数组:' . self::to_string($arr) . '</br>';
            echo '排序后数组:' . self::to_string(self::insert_sort($arr));
            
        }

        /**
        * set_data
        * @return random array()
        **/
        public static function set_data($count = 10){
            $result = array();
            for ($i=0; $i < $count; $i++) {
                $result[] = rand(1, 100);
            }
            return $result;
        }

        /**
        * to_string
        * @return string
        **/
        public static function to_string($arr){
            return implode(',', $arr);
        }

        public static function swap($arr, $index1, $index2){
            $tmp = $arr[$index1];
            $arr[$index1] = $arr[$index2];
            $arr[$index2] = $tmp;
            return $arr;
        }

        /*冒泡排序*/
        public static function bubble_sort($arr = array()){
            for ($i=count($arr)-1; $i > 0; $i--) {
                for ($j=0; $j < $i; $j++) {
                    if ($arr[$j+1] < $arr[$j]) {
                        $arr = self::swap($arr, $j+1, $j);
                    }
                }
            }
            return $arr;
        }

        /*选择排序*/
        public static function selection_sort($arr = array()){
            for ($i=0; $i < count($arr)-1; $i++) { 
                for ($j=$i+1; $j < count($arr); $j++) { 
                    if ($arr[$i] > $arr[$j]) {
                        $arr = self::swap($arr, $i, $j);
                    }
                }
            }
            return $arr;
        }
        /*插入排序*/
        public static function insert_sort($arr = array()){
            for($i=1; $i <= count($arr)-1; $i++){
                if($arr[$i] < $arr[$i-1]){
                    $temp = $arr[$i];
                    for($j=$i-1; $j >= 0 && $arr[$j] > $temp; $j--){
                        $arr[$j+1] = $arr[$j];
                    }
                    $arr[$j+1] = $temp;
                }
            }
	    return $arr;
        }
    }
 ?>
