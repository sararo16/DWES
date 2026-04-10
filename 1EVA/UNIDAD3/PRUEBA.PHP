
<?php
/*
 $paper[] = "Copier <br>";
 $paper[] = "Inkjet <br>";
 $paper[] = "Laser <br>";
 $paper[] = "Photo <br>";
 var_dump($paper);

*/

 $paper['copier'] = "Copier & Multipurpose";
 $paper['inkjet'] = "Inkjet Printer";
 $paper['laser'] = "Laser Printer";
 $paper['photo'] = "Photographic Paper";
 echo $paper['laser'];
 print_r($paper);
 echo "<br>";
 var_dump($paper);
?> 