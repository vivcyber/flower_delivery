<?php
$page_name = 'login';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
    <style>
        body{
        background: url(./imgs/bg/pexels-karolina-grabowska-4207571.jpg);
        background-size: cover;
    }
        .form-group small.form-text {
            color: red;
        }

    </style>
<div class="container ">

        <div id="info-bar" class="alert alert-info" role="alert" style="display: none">
            123
        </div>

    <div class="row  d-flex justify-content-center  py-5 vh-100">
        <div class="col-lg-6 card p-5">
            <form name="form1" method="post" onsubmit="return checkForm()">
                <h3>Join Us</h3>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small id="emailHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small id="mobileHelp" class="form-text"></small>
                    <!-- <small id="mobileHelp" class="form-text"></small> -->
                </div>
                <button type="submit" class="btn btn-primary w-100">登入</button>
            </form>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;


    function checkForm(){
        $.post('login-api.php', $(document.form1).serialize(), function(data){
            if(data.success){
                $('#info-bar').show().text('登入成功');
                setTimeout(function(){
                    location.href = 'index_.php';
                }, 1000);

            } else {
                $('#info-bar').show().text('帳號或密碼錯誤');
            }
        }, 'json');

        return false;
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>