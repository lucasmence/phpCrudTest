<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FX Notificação - Noticias</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fxnotificacao.css">
    <script src="js/bootstrap.min.js"></script>

</head>
<body> 
    <div>
        <div>
            <h1>FX NOTIFICACAO</h1>
            <h3>Cadastro de Noticia</h3>
        </div>
        <form action="/postNews.php" method="POST">
            Titulo
            <br>
            <input type="text" name="edtTitulo" placeholder="Titulo" value=""/>
            <br>
            Data publicacao
            <br>
            <input type="date" name="edtDataPublicacao" />
            <br>
            Data Expiracao
            <br>
            <input type="date" name="edtDataExpiracao" />
            <br>
            <input type="checkbox" name="ckbNumeroSerie" value="usarNumeroSerie" />Filtrar por número de série<br>
            <input type="text" name="edtNumeroSerie" />
            <br>
            Sistemas
            <br>
            <div>
                <input type="checkbox" name="ckbSistemaTodos" checked="True" value="todos" />Todos  &nbsp; 
                <input type="checkbox" name="ckbSistemaContabilidade" value="contabilidade" />Contabilidade &nbsp;    
                <input type="checkbox" name="ckbSistemaEscrita" value="escrita" />Escrita Fiscal &nbsp;  
                <input type="checkbox" name="ckbSistemaFolha"value="folha" />Folha de Pagamento  &nbsp; 
                <input type="checkbox" name="ckbSistemaErp"value="erp" />ERP   
                <br>
            </div>
            <div>
                <h2>Conteúdo</h2>
                <textarea name="txtConteudo" style="width:500px; height:200px;"></textarea>
            </div>
            <div>
                <input class="" type="submit" name="btnPublicar" value="Publicar"/>
                <input class="" type="button" name="btnCancelar" value="Cancelar" />
            </div>
        </form>


    </div>

</body>
</html>