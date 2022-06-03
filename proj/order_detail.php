<?php
require __DIR__. '/__connect_db.php';
$perPage = 6;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$pageBtnQS = [];

$where = ' WHERE 1 ';
if(! empty($cate)){
    $where .= " AND category_sid=$cate ";
    $pageBtnQS['cate'] = $cate;
}


// 總筆數
$t_sql = "SELECT COUNT(1) FROM products $where ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$totalPages = ceil($totalRows/$perPage); // 總頁數
if($page<1) $page=1;
if($page>$totalPages) $page=$totalPages;

$rows = [];
$userid=$_SESSION['loginUser']['id'];
// echo $userid;
// 如果有資料
if($totalRows>0){
    $sql = sprintf("SELECT * FROM orders o join order_details od on o.sid = od.order_sid join products p on od.product_sid = p.sid join members m on o.member_sid = m.id WHERE m.id=$userid ORDER BY `od`.`order_sid` ASC");
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}



?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    body{
        background: url(./imgs/bg/pexels-olya-kobruseva-6954825.jpg);
        background-size: cover;
    }
</style>




   <div class="container">







   
       <div class="main p-5 m-5 card">
           <?php $od=0;foreach($rows as $r):
              if($od!=$r['order_sid']){
                echo "
                <div class="."pt-5".">
                <table class="."w-100 ".">
                <tbody>
                  <tr>
                     <td>訂購日期：".$r['order_date']."</td>
                     <td class="."text-end "."><h5 class="."text-danger".">總金額：NT".$r['amount']."</h5></td>
                  </tr>
                </tbody>
                </table>
                </div>
              
                ";
              $od=$r['order_sid'];
            };
              echo "
              <div class="."card".">
              <table>
              <tbody>
                <tr>
                   <th scope="."row"."></th>
                   <td><img src="."imgs/small/".$r['book_id'].".jpg"." class="."card-img"." style="."width:100px;"."></td>
                   <td>".$r['bookname']."</td>
                   <td>NT".$r['price']."</td>
                </tr>
              </tbody>
              </table>
              </div>
           
           
           
              ";
           
             endforeach; ?>
           
           
           
           
              </div>
       </div>

   </div>




  







           






<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
           <?php $od=0;foreach($rows as $r): ?>
           var a = <?= $r['bookname'] ?>
           alert(1);
            
            <?php endforeach;?>
            


   
            // const renderRow = ({
              
            // }) => {
            //     return `<div class="card col-3 d-flex m-1 mb-5 flex-column justify-content-between ">
            //     <img src="./imgs/product/${book_id}.jpg" alt="" class="card-img-top">
            //     <div class="cardbody m-2">
            //     <h5>${bookname}</h5>
            //     <h6 class="text-secondary">${order_date}</h6>
               
            //     </div>
            //        <div class="cardfoot m-2">
                    
            //            <h2 class ="fw-light text-primary">NT<span>${ price}</span></h2>
            //         </div>
                   
                
            //     </div>
                
            // </div>
            //     `
            // };

          

            function renderTable() {
                const tbody = document.getElementById("productcard")
                let html = "";
                if (data.rows && data.rows.length) {
                    html = data.rows.map((r) => renderRow(r)).join("");
                }
                tbody.innerHTML = html;
            }

          
           
           
            
        </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>



