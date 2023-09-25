<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
</head>
<body>
<h3>UPLOAD de arquivos usando HTML e PHP </h3>
<b>A) acesse o arquivo php.ini (acessível através do botão "config" do Apache no XAMPP) e liste os valores definidos para file_uploads, upload_max_filesize, upload_tmp_dir, post_max_size, max_input_time.<b><br><br>
<b>
file_uploads=On<br>
upload_max_filesize=40M<br>
upload_tmp_dir="C:\xampp\tmp"<br>
post_max_size=40M<br>
max_input_time=60<br><br></b>

<b>B) para que servem as funções is_uploaded_file() e move_uploaded_file()<b><br><br>

<b>is_uploaded_file() :  em PHP é utilizada para verificar se um arquivo foi enviado para o servidor web através de um formulário HTTP POST.<br>

move_uploaded_file:  é usada para mover um arquivo carregado para o servidor para um local específico no sistema de arquivos do servidor.</b><br><br>

<b>C) Para que serve a tag input type="hidden"?<br><br>
<b>Serve para criar um campo de entrada oculto em um formulário web.<br>
 Este campo é invisível para o usuário e não é exibido na página da web, mas pode ser usado para enviar dados adicionais junto com o formulário quando ele é enviado para o servidor.</b><br><br>

<b>D) Como filtrar as extensões de arquivos que serão aceitas para upload no programa PHP?</b><br><br>
<b> Crie uma lista de extensões permitidas,Verifique se a extensão está na lista de extensões permitidas usando `in_array()`. Se não estiver, exiba uma mensagem de erro ou tome medidas apropriadas.
Isso ajuda a garantir que apenas arquivos com extensões permitidas sejam aceitos durante o upload, aumentando a segurança do seu sistema.
</b>
 



    <?php
    if (isset($_POST['proc'])){

        $arquivo = $_FILES ['arquivo'];
        $arquivo1 = explode('.',$arquivo['name']);
        $extensao = strtolower(end($arquivo1));
        
        if ($extensao != 'jpg' && $extensao != 'png' && $extensao != 'bmp');{
         echo'Arquivo de imagem enviado!';
        }
      {
        
        $caminho_imagem = 'uploads/img/' . $arquivo['name'];
        move_uploaded_file($arquivo['tmp_name'], $caminho_imagem);
        echo '<h3>Prévia da Imagem:</h3>';
        echo "<img src='$caminho_imagem' alt='Prévia da imagem' style='max-width: 300px; max-height: 300px;' />";
    }
    }
    if (isset($_POST['enviar_pdf'])) {
        $arquivo_pdf = $_FILES['arquivo_pdf'];
    if (is_uploaded_file($arquivo_pdf['tmp_name'])){    
        $extensao_pdf = pathinfo($arquivo_pdf['name'], PATHINFO_EXTENSION);}
    
        if ($extensao_pdf != 'pdf') {
            echo 'PDF OK';
        }  {
            echo 'PDF OK!';
            $caminho_pdf = 'uploads/pdf/' . $arquivo_pdf['name'];
            move_uploaded_file($arquivo_pdf['tmp_name'],  $caminho_pdf);
            echo '<h3>Link para o PDF:</h3>';
            echo "<a href = '$caminho_pdf' target='_blank'>Baixar PDF</a>";
        }
    }

    ?>
    <h2>Enviar Imagem</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo" accept="image/png,image/jpeg,image/bmp" required  />
        <input type="submit" name="proc" value="Enviar imagem "/><br><br><br>



    <h2>Enviar PDF</h2>
    </form>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo_pdf" accept=".pdf" require >
        <input type="submit" name="enviar_pdf" value="Enviar PDF">
    </form> 

    
    


</body>
</html>