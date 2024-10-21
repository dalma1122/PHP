<?php
include "ArrayManipulator.php";

$manipulator = new ArrayManipulator();

//__set es __get
$manipulator->name = "Pista";
$manipulator-> value = "36";
echo "Name: " . $manipulator->name ."<br> Value: ". $manipulator->value ."<br>";

//__toString
echo $manipulator . "<br>";

//__isset
echo "Is name set? " . (isset($manipulator->name) ? "Yes":"No") . "<br>";
echo "Is email set? " . (isset($manipulator->email) ? "Yes":"No") . "<br>";

//__unset
unset($manipulator->name);
echo "Is name unset? ". (isset($manipulator->name) ? "Yes":"No") . "<br>";

//_clone
$cloneManipulator = clone $manipulator;
$cloneManipulator->name = "Jancsi";
echo $manipulator . "<br>";
echo $cloneManipulator;
?>