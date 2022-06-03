<?php session_start(); ?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
        
        .part1 {
            background: url(./imgs/bg/pexels-monicore-136255.jpg);
            background-size: cover;
            min-height:100vh;
            padding: 24px;
        }

        .card {
            width: 50%;
            padding: 48px;
            background-color: rgba(255, 255, 255, 0.5);
            opacity: 100;
           


        }

        .mybtn {
            background-color: white;
            color: black;
            border: none;
        }

        .mybtn:hover {
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);

        }

        .part2 {
            background: url(./imgs/bg/pexels-josé-luis-photographer-2388257.jpg);
            background-size: cover;
            padding: 24px;
            min-height:100vh;
            padding: 24px;
        }

        .part3 {
            background: url(./imgs/bg/pexels-lina-kivaka-1524142.jpg);
            background-size: cover;
            min-height:100vh;
            padding: 24px;
            
        }

        .part4 {
            background: url(./imgs/bg/pexels-irina-iriser-1158961.jpg);
            background-size: cover;
            min-height:100vh;
            padding: 24px;
            
        }

        .card2 {
            background-color: black;
            width: 80%;
            padding: 48px;
            color: white;
        }

        .banner {
            background: url(./images/pexels-monicore-136255.jpg);
            background-size: cover;
            height: 100vh;
        }

        .mynavbtn {
            color: white;
            font-size: 20px;
            margin-left: 24px;
            font-weight: 300;
            font-family: sans-serif;
            transition: 1s ease;
        }

        .mynavbtn:hover {
            color: white;
            text-decoration: underline;
            letter-spacing: 12px;
        }

        nav {
            position: fixed;
            top: 0;
            background-color: rgba(0, 0, 0, 0.418);
            padding-top: 12px;
            padding-bottom: 12px;
            z-index: 999;


        }
        a{
            text-align: center;
        }

        html {
            scroll-behavior: smooth;
        }
        h1{
            transition: .5s ease;
        }
        .card:hover h1{
            letter-spacing: 4px;
        }

       
    </style>


<div id="visit" class=" part1 container-fliud d-flex  align-items-center ">
        <div class="container ">
            <div class="left-in card ">
                <h1>Flower Season</h1>
                <br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolore harum optio, odio soluta,
                    a libero et ex, rerum quia quibusdam ipsa aut dolorem mollitia delectus eveniet sit animi? Earum.
                </p>
                <br>

                <button class="mybtn p-3">View More</button>
            </div>
        </div>

    </div>
    <div id="plants" class="grid part2 container-fliud d-flex  align-items-center ">
        <div class="container justify-content-end  ">
            <div class="row justify-content-end">
                <div class="right-in card reveal ">
                    <h1>Potted Plants</h1>
                    <br>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolore harum optio, odio
                        soluta,
                        a libero et ex, rerum quia quibusdam ipsa aut dolorem mollitia delectus eveniet sit animi?
                        Earum.
                    </p>
                    <br>
                    <button class="mybtn p-3">View More</button>
                </div>
            </div>
        </div>

    </div>
    <div id="Customised" class=" part3 container-fliud d-flex  align-items-center ">
        <div class="container ">
            <div class="left-in card ">
                <h1>Flower for Parties</h1>
                <br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolore harum optio, odio soluta,
                    a libero et ex, rerum quia quibusdam ipsa aut dolorem mollitia delectus eveniet sit animi? Earum.
                </p>
                <br>

                <button class="mybtn p-3">View More</button>
            </div>
        </div>

    </div>
    <div id="cafe" class="grid part4 container-fliud d-flex  align-items-center ">
        <div class="container d-flex  align-items-center justify-content-center ">
            <div class="buttom-in card2 m-0 justify-content-center reveal ">
                <h1>Having Here</h1>
                <br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident dolore harum optio, odio soluta,
                    a libero et ex, rerum quia quibusdam ipsa aut dolorem mollitia delectus eveniet sit animi? Earum.
                </p>
                <br>

                <button class="btn btn-outline-light p-3">View More</button>
            </div>
        </div>

    </div>


<?php include __DIR__ . '/parts/footer.php'; ?>
<?php include __DIR__ . '/parts/scripts.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.3.6/scrollreveal.min.js"></script>
<script>
		window.sr = ScrollReveal()

		sr.reveal(".left-in",{
            origin: "left",  
			distance: "200px",  
			duration: 1000,  
			opacity: 0, 
			easing: "cubic-bezier(0.6, 0.2, 0.1, 1)",
			mobile: true, 
			reset: true, 
			useDelay: "always",
			viewFactor: 0.2, 
		
            

            })
        sr.reveal(".right-in",{
            origin: "right",  
			distance: "200px",  
			duration: 1000,  
			opacity: 0, 
			easing: "cubic-bezier(0.6, 0.2, 0.1, 1)",
			mobile: true, 
			reset: true, 
			useDelay: "always",
			viewFactor: 0.2, 
           

            })
            sr.reveal(".buttom-in",{
            origin: "bottom",  
			distance: "200px",  
			duration: 1000,  
			opacity: 0, 
			easing: "cubic-bezier(0.6, 0.2, 0.1, 1)",
			mobile: true, 
			reset: true, 
			useDelay: "always",
			viewFactor: 0.2, 
           

            })
	</script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>