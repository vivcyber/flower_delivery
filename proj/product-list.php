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
   
<div class="row">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        商品已加入購物車
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
    <div class="col-md-2">

    
        <!-- 分類選單 -->
        <div class="btn-group-vertical text-end mt-5" style="width: 100%">
            <a type="button" href="?" class="fs-6 p-2 text-decoration-none text-end <?= empty($cate) ? 'btn-primary text-white' : 'btn-outline-primary' ?>">+ All</a>
            <?php foreach($cates as $c): ?>
            <a type="button" href="?cate=<?= $c['sid'] ?>" class="fs-6 p-2 text-decoration-none text-end <?= $cate==$c['sid'] ? 'btn-primary text-white' : 'btn-outline-primary' ?>">
                +<?= $c['name'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-10 card mt-5 ">
                               
        <div class="row p-3">
            <?php foreach($rows as $r): ?>
            <div class="col-md-4 product-unit my-3 " data-sid="<?= $r['sid'] ?>">
                <div class="card"  >
                   
                        <img src="imgs/small/<?= $r['book_id'] ?>.jpg" class="card-img-top " alt="...">
                    
                    <div class="card-body">
                        <h6 class="card-title fs-5"><?= $r['bookname'] ?></h6>
                        <p class="card-text text-primary "><i class="fa-solid fa-leaf "></i><?= $r['author'] ?></p>
                        <p class="card-text text-danger fs-4">NT <?= $r['price'] ?></p>
                        <form>
                            <div class="form-group w-100 d-flex justify-content-between">
                                <select class="form-control qty mr-3" style="display: inline-block; width:100%">
                                    <?php for($i=1; $i<=10; $i++){ ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                               
                                <button type="button" class="btn btn-outline-primary add-to-cart-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="col d-flex justify-content-center mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item  <?= $page==1 ? 'disabled' : '' ?>">
                            <a class="page-link " href="?<?php
                            $pageBtnQS['page']=$page-1;
                            echo http_build_query($pageBtnQS)
                            ?>">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>
                        </li>
                        <?php for($i=1; $i<=$totalPages; $i++):
                            $pageBtnQS['page']=$i;
                            ?>
                            <li class="page-item  <?= $i===$page ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($pageBtnQS) ?>">
                                    <?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page==$totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?<?php
                            $pageBtnQS['page']=$page+1;
                            echo http_build_query($pageBtnQS)
                            ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
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