<?php

/**
 * 图
 * Class Graph
 */
class Graph{

    const MATRIX_TYPE          = 1;//矩阵
    const LIST_TYPE            = 2;//链表
    const ORTHOGONAL_LIST_TYPE = 3;//十字链表


    private $edge_collection   = [];
    private $vertex_collection = [];
    private $is_direction      = false;
    private $storage_type      = self::MATRIX_TYPE;

    private $matrix            = [];




    public function addEdge(Edge $edge){
        $this->edge_collection[]=$edge;
        $this->updateStorage();
    }
    public function addVertex(Vertex $vertex){
        $this->vertex_collection[] = $vertex;
        $this->updateStorage();
    }
    public function __construct(
        $is_direction=false,
        $storage_type  = self::MATRIX_TYPE
    ){
        $this->is_direction      = $is_direction;
        $this->storage_type      = $storage_type;
    }
    private function updateStorage(){
        $list1 =  $this->vertex_collection;
        $list2 =  $this->vertex_collection;
        $this->matrix = [];
        foreach($list1 as $k1=> $v1){
            foreach($list2 as $k2=> $v2){
                $this->matrix[$k1][$k2]=$this->isLink($v1,$v2);
            }
        }
    }
    private function isLink($vertex_1,$vertex_2){
        if($this->is_direction){
            foreach($this->edge_collection as $v){
                list($ver_1,$ver_2) = $v->getVertex();
                if([$ver_1,$ver_2] == [$vertex_1,$vertex_2]){
                    return 1;
                }
            }
        }else{
            foreach($this->edge_collection as $v){
                list($ver_1,$ver_2) = $v->getVertex();
                if([$ver_1,$ver_2] == [$vertex_1,$vertex_2] || [$ver_2,$ver_1] == [$vertex_1,$vertex_2]){
                    return 1;
                }
            }
        }
        return 0;
    }
    public function __toString(){
        if($this->storage_type == self::MATRIX_TYPE){
            return $this->toStringMatrix();
        }
        return '';
    }
    /**
     * 矩阵类型输出结构
     * @return string
     */
    private function toStringMatrix(){
        $out_arr = [];
        $out_arr[] = '-----------Graph----------';
        $tmp = '               |';
        foreach($this->vertex_collection as $v){
            $tmp .= '['.strval($v).']';
        }
        $out_arr[] = $tmp;
        $tmp = '';
        foreach($this->matrix as  $k1=>$v1){
            if($k1 == 0){
                $tmp  .= str_pad('---------------',(count($this->vertex_collection)+1)*15,'-');
                $tmp  .=  "\n";
            }
            foreach($v1 as $k2=>$v2){
                if($k2 == 0){
                    $tmp  .=  '['. $this->vertex_collection[$k1].']|';
                }
                $tmp  .=  str_pad( "($v2)",15,' ',STR_PAD_BOTH);
            }
            $tmp  .=  "\n";
        }
        $out_arr[] = trim($tmp) ;
        $out_arr[] = '--------------------------';
        $out_arr[] = '';
        return implode("\n",$out_arr);
    }
}
class Edge{
    private $vertex_0     = null;
    private $vertex_1     = null;

    public function __construct($vertex_0,$vertex_1){
        $this->vertex_0     = $vertex_0;
        $this->vertex_1     = $vertex_1;
    }
    public function getVertex(){
        return [$this->vertex_0,$this->vertex_1];
    }
    public function __toString(){
        $str = "({$this->vertex_0},{$this->vertex_1})";
        return $str;
    }
}

/**
 * 图上点
 */
class Vertex{
    /**
     * 图的点的ID
     * @var null|string
     */
    private $id = null;
    public function __construct(){
        $this->id = uniqid();
    }
    public function __toString(){
        return strval($this->id);
    }
}