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
// 如果有資料
if($totalRows>0){
    $sql = sprintf("SELECT * FROM products $where LIMIT %s, %s", ($page-1)*$perPage, $perPage);
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
}

// 分類資料
$c_sql = "SELECT * FROM categories WHERE parent_sid=0";
$cates = $pdo->query($c_sql)->fetchAll();


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
   
<div class="m-5">
    <div class="card">
        <h3>Orders</h3>
        
        <h5>訂購時間</h5>
        <h5>訂單金額</h5>

        <p>商品名稱</p>
        <p>商品金額</p>
    </div>




    
  
</div>

</div>


<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const btn = $('.add-to-cart-btn');

    btn.click(function(){
        const sid = $(this).closest('.product-unit').attr('data-sid');
        //const qty = $(this).prev().val();
        const qty = $(this).closest('.product-unit').find('.qty').val();

        //console.log({sid, qty});

        $.get('add-to-cart-api.php', {sid, qty}, function(data){
            countCartObj(data);
        }, 'json');
    });

</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>