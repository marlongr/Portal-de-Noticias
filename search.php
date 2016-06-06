<?php 

if ($_SERVER['REQUEST_METHOD'] != 'POST') header('Location: index.php');

include 'inc/head.inc.php'; 
include 'classes/noticia.class.php';

$noticia = new Noticia();

$noticias = $noticia->search('word');

?>

<body>
	<div class="wrapper sticky_footer">
        <?php include 'inc/header.inc.php';?>
        <!-- CONTENT BEGIN -->
        <div id="content" class="right_sidebar">
        	<div class="inner">
             <div class="general_content">
                 <div class="main_content">

                    <div class="block_home_col_1">
                     <?php  if (count($noticias)): foreach ($noticias as $noticia): ?>
                         <div class="block_home_post">
                            <div class="pic">
                             <a href="noticia.php?id=<?=$noticia['id_noticia']?>" class="w_hover">
                              <img src="imgnoticias/<?=$noticia['id_noticia']?>.jpg" width="70" height="50" alt="">
                              <span></span>
                          </a>
                      </div>

                      <div class="text">
                         <p class="title"><a href="noticia.php?id=<?=$noticia['id_noticia']?>"><?=$noticia['gravata']?>...</a></p>
                         <div class="date"> <p><?=$noticia['data']?></p></div>
                     </div>
                 </div>
                 <div class="line_3" style="margin:14px 0px 17px;"></div>
             <?php endforeach; else:?>  
             <h2>Nenhum Resultado Encontrado.</h2> 
         <?php endif; ?>     
         
         <div class="separator" style="height:30px;"></div>

         <div class="sidebar"> 

           <div class="block_newsletter">

            <button href="feed-rss.php" class="btn btn-default">RSS</button>

        </div>

    </div>
</div>

<?php include 'inc/footer.inc.php'; // inclusao do footer  ?>
</div>
</body>
</html>