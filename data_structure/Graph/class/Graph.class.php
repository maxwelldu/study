<?php

/**
 * 图
 * Class Graph
 */
class Graph{

    const MATRIX_TYPE          = 1;//矩阵
    const ADJACENCY_LIST_TYPE  = 2;//邻接链表
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
        if(isset($this->vertex_collection[$vertex->getId()])){
            throw new GraphVertexExistException($vertex->getId()."已经存在.");
        }
        $this->vertex_collection[$vertex->getId()] = $vertex;
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
        if($this->storage_type == self::MATRIX_TYPE){
            $list1 =  $this->vertex_collection;
            $list2 =  $this->vertex_collection;
            $this->matrix = [];
            foreach($list1 as $k1=> $v1){
                foreach($list2 as $k2=> $v2){
                    $this->matrix[$k1][$k2]=$this->isLink($v1,$v2);
                }
            }
        }elseif($this->storage_type == self::ADJACENCY_LIST_TYPE){

        }

    }
    private function isLink($vertex_1,$vertex_2){
        if($this->storage_type == self::MATRIX_TYPE){
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
        $i = 0;
        foreach($this->matrix as  $k1=>$v1){
            if($i == 0){
                $tmp  .= str_pad('---------------',(count($this->vertex_collection)+1)*15,'-');
                $tmp  .=  "\n";
            }
            $i1=0;
            foreach($v1 as $k2=>$v2){
                if($i1 == 0){
                    $tmp  .=  '['. $k2.']|';
                }
                $tmp  .=  str_pad( "($v2)",15,' ',STR_PAD_BOTH);
                $i1++;
            }
            $tmp  .=  "\n";
            $i++;
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
    public function __construct($id = null){
        if($id == null){
            $this->id = uniqid();
        }else{
            $this->id = $id;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function __toString(){
        return strval($this->id);
    }
}
class GraphVertexExistException extends  Exception{}