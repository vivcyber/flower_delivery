
<?php 
require __DIR__. '/__connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];
    if(isset($_POST['customorder']))
    {
        $flo_name = $_POST['flo_name'];
        $flower_type = $_POST['flower_type'];
        $flo_color_name = $_POST['flo_color_name'];
        $flo_color = $_POST['flo_color'];
        $papper_color_name = $_POST['papper_color_name'];
        $papper_color = $_POST['papper_color'];
        $papper_pattern_name = $_POST['papper_pattern_name'];
        $papper_pattern = $_POST['papper_pattern'];
        $ribbon_name = $_POST['ribbon_name'];
        $ribbon = $_POST['ribbon'];
        $card = $_POST['card'];
        // $total = $_POST['total'];
        
        $total = $flower_type+$flo_color+$papper_color+$papper_pattern+$ribbon+$card ;

     
       

        $con = mysqli_connect("localhost","root","","flowers");

        $query="INSERT INTO `custom_detail`(`flo_name`,`flower_type`,`flow_color_name`, `flo_color`,`papper_color_name`, `papper_color`,`papper_pattern_name`, `papper_pattern`,`ribbon_name`, `ribbon`, `card`, `total`) VALUES ('$flo_name','$flower_type','$flow_color_name',' $flo_color','$papper_color_name',' $papper_color','$papper_pattern_name','$papper_pattern','$ribbon_name','$ribbon','$card',' $total')";

        // $query="INSERT INTO `camproduct2`(`productname`, `productcategory`, `productcolor`, `productinfo`, `productimg`, `productprice`, `productleft`, `productspec`, `productinclude`, `productimg2`, `productimg3`) VALUES ('$productname',' $productcategory','$productcolor','$productinfo','$productimg','$productprice','  $productleft',' $productspec',' $productinclude','$productimg2','$productimg3')";

        echo $query;
        $result = mysqli_query($con, $query);


       

        if($result==1)
        {  
            
            
            header('Location:index_.php');

            // echo "添加成功";
        
        }
        else {       

        echo "Insertion Failed";

             }
    }

    // if ($result == 1) {
    //     $output['success'] = true;
    // } else {
    //     $output['error'] = '資料無法新增';
    // }
    
    
    
    // echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>