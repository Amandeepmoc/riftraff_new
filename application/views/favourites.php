<?php include('header2.php'); ?>
<style>
    .dealer-panel1 ul.tabss li{float:left;padding:4px;border-radius:5px;background:#c0d8f0;border-style:solid;border-width:2px;border-color:#747eb6 #747eb6 transparent #747eb6}
    .dealer-panel1 ul.tabss li a{ font-size: 18px;font-family: "Arial";color: rgb(0, 0, 0);padding:0px 10px;font-weight:500;}
    .left-bar p, .left-bar ul li a{padding-left:10px;}  .dealer-bg{background:#ffd687;/*width:95%;*/padding-bottom:20px;}.dealer-panel .panel-heading{background:#fff;padding:20px;border-top-left-radius:1em;border-top-right-radius:1em; font-size: 22px;}.dealer-panel .panel-heading span{font-size: 18px;}div.panel-body1{padding:0px;}div.dealer-panel1{margin-bottom:0px;}div.dealer-panel1, div.dealer-panel3{background:#fff!important;border-top-left-radius:1em;border-top-right-radius:1em;}.dealer-panel1 .panel-heading, .dealer-panel3 .panel-heading{border-radius:0.5em;margin:5px;background: #6bc8f1;background: -webkit-linear-gradient( #6bc8f1,#3299d4); background: -o-linear-gradient(#6bc8f1,#3299d4); background: -moz-linear-gradient(#6bc8f1,#3299d4); background: linear-gradient(#6bc8f1,#3299d4);font-size:22px;font-weight:600;}.dealer-panel1 .panel-heading ul li a, .dealer-panel3 ul li a, .dealer-panel1 .panel-heading a{color:#000;text-decoration:none;}.dealer-panel3 .panel-heading{color:#fff;}.dealer-panel3 div.head-color{color:#ff0000;}.dealer-panel3 h3{margin:0px;}.dealer-panel3 h3{margin:0px;} .dealer-panel3  h4{margin:5px 0px;}.dealer-panel3 p{font-size:12px;}.panel3{border-radius:0px!important;}/ .dealer-border{background:#fffee2;} /.dealer-border .dealer-div{border-right:1px solid #aaa;background:#fff;}.dealer-border .dealer-div .card-block p,.dealer-border .dealer-div .rating{font-size:11px;}.right-bar h3{ font-size: 14px;font-family: "Arial";color: rgb(0, 0, 0);font-weight: bold;position:relative;}.right-bar h3:after{height:2px;border-top:2px solid #000;width:100%;content:' ';position:absolute;top:17px;left:0;}.right-bar .space h2{margin:0px;font-size:20px;}.right-bar .space h4{margin:0px;font-size:13px;}.right-bar .space p{font-size:12px;line-height:1.1;}.visit{font-size: 14px;font-family: "Arial";color: rgb(255, 255, 255); font-weight: bold;width:100%;}.bg-h3{background:#56b6e6;background:linear-gradient(#5fbeea , #40a3dc);padding:0.5px 0px 3px ;}.bg-h3{margin-top:13px;}.ad img{margin-bottom:10px;width:100%;}.ad{background:#fff;}.see-more a, .view a{color:#98999b;font-family: "Arial",sans-serif;font-size:16px;}.see-more a:hover{text-decoration:none;color:#98999b;}.view a:focus, .view a:hover{color:#206fbf;text-decoration:none;}.left-text h4, .left-text p, .left-text ul li a{ font-size: 16px;font-family: "Arial";color: rgb(0, 0, 0);}.right-bar .space h2 span{color:#000;font-size:14px;text-decoration:line-through;padding-left:20px;}.dealer-panel3 iframe{height:150px;}.panel{box-shadow:none!important;}.left-bar{background:#e6e6e6;padding-top:10px;word-wrap:break-word;}
    @media (max-width:1366px){ .ad img {width: 88%;}.dealer-panel3 iframe{height:138px;} .right-bar h2{font-size:17px;} .right-bar .space h4{margin:3px 0px;font-size:12px;} .right-bar .space p{font-size:11px;} .see-more a, .view a{font-size:14px;} .right-bar .space h2 span{font-size:12px;} .left-bar{padding-bottom:55px;} .right-bar  div.space{padding-left:4px;padding-right:0px;}}
    @media (max-width:1280px){ .right-bar h2{font-size:15px;} .right-bar .space h2 span{font-size:11px;} .left-text h4, .left-text p, .left-text ul li a{font-size:14px;} .see-more a, .view a{font-size:12px;} .dealer-panel3 iframe{height:125px;} .left-bar{padding-bottom:75px;}  .ad img {margin-bottom: 20px;} .right-bar div.space{padding-left:4px;padding-right:0px;}.dealer-panel .panel-heading{font-size:19px;} .dealer-panel .panel-heading span{font-size:16px;}}
    @media (max-width:1024px){ .dealer-panel .panel-heading{font-size:18px;} .dealer-panel .panel-heading span{font-size:16px;} .dealer-panel3 iframe{height:90px;} .dealer-panel1 .panel-heading, .dealer-panel3 .panel-heading{font-size:18px;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:12px;} .right-bar div.space{padding-left:4px;padding-right:0px;} .right-bar .space h2{font-size:13px;} .right-bar .space h2 span{font-size:10px;} .right-bar .space h4{font-size:11px;} .rating-container .clear-rating{display:none!important;} .right-bar .space p{font-size:10px;margin-bottom:0px;} .left-bar{padding-bottom:0px;} .zero{padding:0px 3px!important;font-size:12px;}
                               @media (max-width:980px){.ad img{width:33%;float:left;} .ad img:nth-child(2){margin:0px 3px;} div.ad{padding:0px;} .dealer-panel3 iframe{height:100px;} .right-bar h2{font-size:18px;} .right-bar .space h4{font-size:12px;} .right-bar .space p{font-size:13px;} .dealer-border .dealer-div.third{border-right:none;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:15px;}}
                               @media (max-width:768px){ .dealer-panel3 iframe {height:100px;}.ad img{width:33%;float:left;} .ad img:nth-child(2){margin:0px 2px;} .right-bar .space h2{font-size:18px;} .right-bar .space h4{font-size:12px;} .right-bar .space p{font-size:9.8px;} .dealer-border .dealer-div{padding:0px 5px;} .dealer-border .dealer-div.third{border-right:none;} .left-text h4, .left-text p, .left-text ul li a, .visit{font-size:15px;} .dealer-bg .dealer-panel1 .panel-body .right-bar{padding:0px;} div.ad{padding:0px;} .dealer-panel .panel-heading span{font-size:16px;}}
                               @media (max-width:480px){ .dealer-panel1 ul.tabss, .dealer-panel1 ul.tabss li{float:none!important;} .dealer-border .dealer-div.third{border-right:1px solid #aaa;} .dealer-border .dealer-div.second{border-right:none;} .right-bar .space p {font-size: 12.8px;} .right-bar .space h4 { font-size: 14px;}  .right-bar .space h2 {font-size: 22px;margin:10px 0px;} .right-bar .space h2 span { font-size: 14px;} div.ad{padding:0px;} .ad img:nth-child(2){margin:0px 1px;}.dealer-panel .panel-heading span{float:none!important;}}
                               .img-holder1{height:305px;overflow:hidden;position:relative;width: 100%;}
                               .img-holder1 img{position:absolute;top:0;right:0;bottom:0;left:0;margin:auto;}
                               @media (min-width:320px) and (max-width:360px)
                               { .img-holder1{height:89px;}}
                               @media (min-width:361px) and (max-width:480px)
                               { .img-holder1{height:125px;}}
                               @media (min-width:481px) and (max-width:767px)
                               { .img-holder1{height:184px;}.dealer-panel1 ul.tabss, .dealer-panel1 ul.tabss li{float:none!important;}}
                               @media (min-width:768px) and (max-width:1023px)
                               { .img-holder1{height:173px;}}
                               @media (min-width:1024px) and (max-width:1279px)
                               { .img-holder1{height:175px;}}
                               @media (min-width:1280px) and (max-width:1365px)
                               { .img-holder1{height:222px;}}
                               @media (min-width:1366px)and (max-width:1919px)
                               { .img-holder1{height:239px;}}

    </style>
    <div class="container-fluid padding header">
        <img src="/images/dealer_locator/heading_bg.jpg" style="width:100%;" class="img-responsive"/>
        <h1>Favourites</h1>
    </div>
    
    <div class="container-fluid " style="height:400px;">

    </div>
    <?php include("footer.php"); ?>
    <script>
        openCity("tab1")
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>
