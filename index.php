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
            for ($i=0; $i < count($arr) - 1; $i++) {
                for ($j=$i + 1; $j < count($arr); $j++) {
                    if ($arr[$i] < $arr[$j]) {
                        $arr = self::swap($arr, $i, $j);
                    }
                }
            }
            return $arr;
        }
    }
 ?>