<?php 
$jsonString='json_data.json';
$jsonData=file_get_contents($jsonString);
$arr=json_decode($jsonData,true);
// foreach($arr as $val){
//     foreach($val as $value){
//         echo $value;
//     }
//     echo "<br>";
// }

echo '<table border="2px" cellspacing="2px" cellpadding="10px" width="100%">';
echo '  
         <th>ID</th>
         <th>Name</th>
         <th>Jersey-No</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Salary</th>
         <th>City</th>
         <th>Role</th>';
foreach($arr as list('id'=>$id,'name'=>$name,'jersey_number'=>$jersy_no,'email'=>$email,'phone'=>$phone,'salary'=>$salary,'city'=>$city,'role'=>$role)){
    echo "<tr>
    <td>{$id}</td>
    <td>{$name}</td>
    <td>{$jersy_no}</td>
    <td>{$email}</td>
    <td>{$phone}</td>
    <td>{$salary}</td>
    <td>{$city}</td>
    <td>{$role}</td>
    </tr>";
}
echo '</table>';
?>