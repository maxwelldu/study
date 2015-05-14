<?php
/**
 * 遍历目录三种方式
 * v1 递归方式
 * v2 队列方式
 * v3 栈方式
 */
class Traversal{
    static public $path = '/Users/chengtao/PhpstormProjects/d1studio/study';
    /**
     * 递归的方式     深度优先遍历
     */
    public static function v1($path){
        $dir = opendir($path);
        while (($file = readdir($dir)) !== false) {
            if(!in_array($file,['.','..'])){
                $file_absolute = $path.'/'.$file;
                if(is_dir($file_absolute)){
                    Traversal::v1($file_absolute);
                }else{
                    echo "filename: $file_absolute \n";
                }
            }
        }
        closedir($dir);
    }
    /**
     * 队列方式的方式  广度优先遍历
     */
    public static function v2($path){
        $dir_queue = [$path];
        while($path = array_shift($dir_queue)){
            $dir = opendir($path);
            while (($file = readdir($dir)) !== false) {
                if(!in_array($file,['.','..'])){
                    $file_absolute = $path.'/'.$file;
                    if(is_dir($file_absolute)){
                        $dir_queue[] = $file_absolute;
                    }else{
                        echo "filename: $file_absolute \n";
                    }
                }
            }
            closedir($dir);
        }
    }
    /**
     * 栈方式   深度优先遍历
     */
    public static function v3($path){
        $dir_stack = [$path];
        while($path = array_shift($dir_stack)){
            $dir = opendir($path);
            while (($file = readdir($dir)) !== false) {
                if(!in_array($file,['.','..'])){
                    $file_absolute = $path.'/'.$file;
                    if(is_dir($file_absolute)){
                        array_unshift($dir_stack,$file_absolute);
                    }else{
                        echo "filename: $file_absolute \n";
                    }
                }
            }
            closedir($dir);
        }
    }
}
Traversal::v1(Traversal::$path);
Traversal::v2(Traversal::$path);
Traversal::v3(Traversal::$path);