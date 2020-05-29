<?php

include 'constants.php';


$billerror = "SELECT IF (EXISTS(SELECT 1 FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW())), 'ERROR', 'SUCCESS') as result;";

$id_property_result=mysqli_query($link,$billerror) or die(mysqli_error());

$row_id_property=mysqli_fetch_array($id_property_result);

$result_data=$row_id_property["result"];


echo $result_data;

// $billsuccess = 'error';
// var_dump($id_property_result);
if ($result_data == 'SUCCESS') {
	# code...
$id_property_sql = "INSERT INTO society_billdisplay (MEMBER_ID,BILL_DATE,BILL_FROM_DATE,BILL_TO_DATE,BILL_DUE_DATE,BILL_DUE_AMT,BILL_STATUS)
select MEMBER_ID, CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','05'), 
CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','01'), 
DATE_ADD(CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())+1),2),'-','01'),INTERVAL -1 DAY), 
CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','20'), 
0, 0 
FROM society_membermaster WHERE MEMBER_ID <> 1;";
$id_property_result1 = mysqli_query($link,$id_property_sql);


$id_property_sql2 = "INSERT INTO society_billgenerate(BILL_ID,MEMBER_ID,M_ID)
SELECT BILL_ID,MEMBER_ID,M_ID
FROM society_billdisplay as a,society_maintaiancemaster as b
where MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW());";
$id_property_result2 = mysqli_query($link,$id_property_sql2);



$id_property_sql3 = "UPDATE society_billdisplay LEFT JOIN (SELECT B.BILL_ID,IFNULL(A.BILL_DUE_AMT,0)+IFNULL(B.BILL_DUE_AMT,0) AS FINALAMT FROM 
    (
SELECT MEMBER_ID,BILL_DUE_AMT FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW())-1 AND YEAR(BILL_DATE)=YEAR(NOW())
) AS A INNER JOIN (
SELECT BILL_ID,MEMBER_ID, BILL_DUE_AMT FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW())
    ) AS B ON A.MEMBER_ID=B.MEMBER_ID) AS SD ON society_billdisplay.BILL_ID=SD.BILL_ID
   SET society_billdisplay.BILL_DUE_AMT=SD.FINALAMT 
   WHERE MONTH(society_billdisplay.BILL_DATE)=MONTH(NOW()) AND YEAR(society_billdisplay.BILL_DATE)=YEAR(NOW()) AND SD.BILL_ID IS NOT NULL;";

$id_property_result3 = mysqli_query($link,$id_property_sql3);
echo "Bill  Generated";

}
else
{

	echo "Bill Alreday Generated";
}

?>