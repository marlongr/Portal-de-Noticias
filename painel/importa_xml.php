<?php
include '../inc/config.php'; // inclusao das configuracoes
include '../inc/head.pages.inc.php'; // inclusao do css e js
include '../classes/noticia.class.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
  move_uploaded_file($_FILES['arquivo']['tmp_name'], "xml/noticias.xml");

  $doc = new DOMDocument();
  $doc->preserveWhiteSpace=false;
  $doc->formatOutput=true;
  $doc->load('xml/noticias.xml');

  $noticias = $doc->getElementsByTagName( "noticia" );
  foreach( $noticias as $noticia )
  {
    $not = new Noticia();

    $not->idPortal = $noticia->getElementsByTagName( "idPortal" )->item(0)->nodeValue;

    $not->titulo = $noticia->getElementsByTagName( "titulo" )->item(0)->nodeValue;

    $not->data = $noticia->getElementsByTagName( "data" )->item(0)->nodeValue;

    $not->conteudo = $noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue;

    $not->gravata = substr($noticia->getElementsByTagName( "conteudo" )->item(0)->nodeValue, 0, 50);

    $not->link = $noticia->getElementsByTagName( "link" )->item(0)->nodeValue;

    $not->save();

  }

  $msg = "Cadastro efetuado com sucesso!";
  
}else{
  $msg = "";
}
?>
    <body>
        <div class="wrapper sticky_footer">
            <?php include '../inc/header.pages.inc.php'; // inclusao do menu de navegacao?>
            <div id="content" class="">
                <div class="inner">
                    <div class="general_content">
                        <div class="main_content">
                            <p class="general_title"><span>IMPORTAR XML NOTÍCIAS</span></p>
                            <div class="separator" style="height:39px;"></div>

                            <div class="block_registration">
                                <form action=""  method="post" enctype="multipart/form-data" class="w_validation">
                                    <div class="col_1">

                                        <div class="form-group">
                                            <label for="usr"><p>Carregar Arquivo XML </p></label>
                                            <input type="file" name="arquivo" class="form-control" id="usr">
                                        </div>

                                    </div>
                                    <div class="col-md-2 col-md-offset-5" >
                                        <p class="info_text"><input type="submit" class="btn btn-default" value="Enviar"></p>
                                    </div>

                                </form>
                                <div class="col-md-2 col-md-offset-5" >
                                    <p><?=$msg?></p>
                                </div>
                            </div>

                            <div class="line_3" style="margin:42px 0px 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include '../inc/footer.pages.inc.php'; ?>
        </div>
    </body>
</html>