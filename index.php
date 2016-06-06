<?php 
include 'inc/head.inc.php'; // inclusao do css e js 
include 'classes/noticia.class.php';

$noticia = new Noticia();

$noticias = $noticia->getAll();

 ?>

<body>
	<div class="wrapper sticky_footer">
        <?php include 'inc/header.inc.php'; // inclusao do menu de navegacao?>
        <!-- CONTENT BEGIN -->
        <div id="content" class="right_sidebar">
        	<div class="inner">
            	<div class="general_content">
                	<div class="main_content">
                        
                        <div class="line_2" style="margin:34px 0px 28px;"></div>

                        <?php foreach ($noticias as $not): ?>
                        <div class="block_home_post">
                            <div class="pic">
                                <a href="noticia.php?id=<?=$not['id_noticia']?>" class="w_hover">
                                    <img src="imgnoticias/<?=$not['id_noticia']?>.jpg" width="70" height="50" alt="">
                                    <span></span>
                                </a>
                            </div>

                            <div class="text">
                                <p class="title"><a href="noticia.php?id=<?=$not['id_noticia']?>"><?=$not['gravata']?>...</a></p>
                                <div class="date"><p><?=$not['data']?></p></div>
                            </div>
                        </div>
                        <div class="line_3" style="margin:14px 0px 17px;"></div>
                        <?php endforeach; ?>             
                    </div>

                    <div class="sidebar">                    	
                       <div class="block_newsletter">
                        	                        
                                <button href="rss/index.php" class="btn btn-default">RSS >>></button>
                        </div>
                      <div class="separator" style="height:31px;"></div>
                    </div>
                	<div class="clearboth"></div>
                </div>
            </div>
        </div>
    	<!-- CONTENT END -->

        <?php include 'inc/footer.inc.php'; // inclusao do footer  ?>
    </div>
</body>
</html>
