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
            
            echo '<h3>希尔排序</h3>';
            $arr = self::set_data(21);
            echo '初始化数组:' . self::to_string($arr) . '</br>';
            echo '排序后数组:' . self::to_string(self::shell_sort($arr));
            
            echo '<h3>堆排序</h3>';
            $arr = self::set_data(21);
            echo '初始化数组:' . self::to_string($arr) . '</br>';
            echo '排序后数组:' . self::to_string(self::heap_sort($arr));
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
        /*希尔排序*/
        public static function shell_sort($arr = array()){
                $increment = count($arr);
	        while ($increment > 1){
	             $increment = floor($increment / 2);
                     for($i=$increment; $i <= count($arr)-1; $i++){
                        if($arr[$i] < $arr[$i - $increment]){
                            $temp = $arr[$i];
                            for($j = $i - $increment;$j >= 0 && $arr[$j] > $temp;$j -= $increment){
                                $arr[$j + $increment] = $arr[$j];
                            }
                        $arr[$j + $increment] = $temp;
                        }
		      }	      
                } 
	        return $arr;
        }
        /*堆排序*/
        public static function heap_sort($arr = array()){
		   $length = count($arr);
		   for($i = floor($length / 2)-1; $i >= 0; $i--){
		   
		      heap_adjust($arr,$i,$length-1);
		     
		   }
		   for($i = $length - 1;$i > 0; $i--){
		          $temp = $arr[$i];
			  $arr[$i] = $arr[0];
			  $arr[0] = $temp;
			  heap_adjust($arr,0,$i-1);
		   }
		}
	public static function heap_adjust($arr,$s,$m){
		        $temp = $arr[$s];
			
			for($j = 2*($s+1)-1;$j <= $m;$j = 2*($j+1) - 1){
			
			   if($j < $m && $arr[$j] < $arr[$j+1])
			      ++$j;
			   if($temp >= $arr[$j])
			      break;
			   $arr[$s] = $arr[$j];
			   $s = $j;
			
			}
			
			$arr[$s] = $temp;
		}
    }
 ?>
