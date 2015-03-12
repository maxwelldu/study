<?php
include 'class/Graph.class.php';



$Vertex_1 = new Vertex();
$Vertex_2 = new Vertex();
$Vertex_3 = new Vertex();
$Vertex_4 = new Vertex();
$Vertex_5 = new Vertex();


$Graph = new Graph();

$Graph->addVertex($Vertex_1);
$Graph->addVertex($Vertex_2);
$Graph->addVertex($Vertex_3);
$Graph->addVertex($Vertex_4);
$Graph->addVertex($Vertex_5);

$Graph->addEdge(new Edge($Vertex_1,$Vertex_2));
$Graph->addEdge(new Edge($Vertex_1,$Vertex_3));
$Graph->addEdge(new Edge($Vertex_1,$Vertex_4));
$Graph->addEdge(new Edge($Vertex_1,$Vertex_5));


echo ($Graph);




