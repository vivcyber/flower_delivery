<?php
$page_name = 'customize';
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
 
<body>

        <div class="container">
            <div class="card m-3 p-3 col-6">
                <!-- <form action="upload_api_beta.php" method="post" enctype="multipart/form-data" onsubmit="javascript: return false;"> -->
                <form id="form1" action="cus_api.php" method="post" enctype="multipart/form-data">
                
                


                                    <lable class="form-label">選擇花</lable>
                                    <input type="hidden" name="flo_name" id="flo_name">
                                    <select name="flower_type" id="flower_type" class="form-control" onchange="myadd()">

                                    <option value="0">--商品種類--</option>
                                    <option value="120">玫瑰--120</option>
                                    <option value="130">鬱金香--130</option>
                                    <option value="150">康乃馨--150</option>
                                    </select><br>

                                    <lable class="form-label">選擇顏色</lable>
                                    <input type="hidden" name="flow_color_name" id="flow_color_name">
                                    <select name="flo_color" id="flo_color" class="form-control" onchange="myadd()">
                                    <option value="0">--商品顏色--</option>
                                    <option value="0">白色--</option>
                                    <option value="20">紅色</option>
                                    <option value="50">紫色</option>
                                    </select><br>


                                    <lable class="form-label">包裝紙</lable>
                                    <input type="hidden" name="papper_color_name" id="papper_color_name">
                                    <select name="papper_color" id="papper_color" class="form-control"onchange="myadd()">
                                    <option value="0">--紙張種類--</option>
                                    <option value="30">牛皮紙</option>
                                    <option value="20">白報紙</option>
                                    <option value="50">花紋包裝紙</option>
                                    </select><br>

                                    <lable class="form-label">包裝紙花紋</lable>
                                    <input type="hidden" name="papper_pattern_name" id="papper_pattern_name">
                                    <select name="papper_pattern" id="papper_pattern" class="form-control" onchange="myadd()">
                                    <option value="0">--紙張種類--</option>
                                    <option value="0">無</option>
                                    <option value="20">英文報紙</option>
                                    <option value="50">燙金點點</option>
                                    </select><br>

                                    <lable class="form-label">緞帶</lable>
                                    <input type="hidden" name="ribbon_name" id="ribbon_name">
                                    <select name="ribbon" id="ribbon" class="form-control" onchange="myadd()">
                                    <option value="0">--綁帶種類--</option>
                                    <option value="0">麻繩</option>
                                    <option value="20">紅色亮面緞帶</option>
                                    <option value="30">黑色絨布緞帶</option>
                                    </select><br>
                                    
                                    <lable class="form-label">卡片</lable>
                                    <input type="hidden" name="card_name" id="card_name">
                                    <select name="card" id="card" class="form-control" onchange="myadd()">
                                    <option value="0">--卡片種類--</option>
                                    <option value="0">牛皮紙卡</option>
                                    <option value="20">花紋邊框</option>
                                    <option value="50">黑色燙金</option>
                                    </select><br>

                                    <!-- <lable class="form-label" id="total" name="total">總計</lable> -->
                                    <p id="total" name="total"></p>
                                    



                                    
                                    
                                    
                            
                
                
                
                                  
                              








                                    <input class="btn btn-primary"type="submit" name="customorder" value="＋新增＋" />
                
                </form>
            </div>
        </div>
 <?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
       


        function myadd(){
            var flower_type =parseInt(document.getElementById('flower_type').value);
            var flo_color =parseInt( document.getElementById('flo_color').value);
            var papper_color =parseInt( document.getElementById('papper_color').value);
            var papper_pattern = parseInt(document.getElementById('papper_pattern').value);
            var ribbon = parseInt(document.getElementById('ribbon').value);
            var card = parseInt(document.getElementById('card').value);
            var total = document.getElementById('total');

            total.innerHTML= flower_type+flo_color+papper_color+papper_pattern+ribbon+card;

            var flo_name = document.getElementById('flower_type');
            document.getElementById('flo_name').value=flo_name.options[flo_name.selectedIndex].text;


            var flow_color_name = document.getElementById('flo_color');
            document.getElementById('flow_color_name').value=flow_color_name.options[flow_color_name.selectedIndex].text;

            var papper_color_name = document.getElementById('papper_color');
            document.getElementById('papper_color_name').value=papper_color_name.options[papper_color_name.selectedIndex].text;


            var papper_pattern_name = document.getElementById('papper_pattern');
            document.getElementById('papper_pattern_name').value=papper_pattern_name.options[papper_pattern_name.selectedIndex].text;

            var ribbon_name = document.getElementById('ribbon');
            document.getElementById('ribbon_name').value=ribbon_name.options[ribbon_name.selectedIndex].text;


            var card_name = document.getElementById('card');
            document.getElementById('card_name').value=card_name.options[card_name.selectedIndex].text;


          
            
            
          

        }
        
  
	</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>