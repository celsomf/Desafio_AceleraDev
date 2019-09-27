<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- SCRIPTS -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js" ></script>
    </head>
    <body>

        <form id="form" method="multipart/form-data">
            <textarea id="rsData" name="rsData" rows="7" style="width: 550px"></textarea>
            <br>
            <textarea id="rsDataconvert" name="rsDataconvert" rows="5" style="width: 580px"></textarea>
            <br>
            <input type="file" name="answer" id="answer" />
            <br>
            <br>
            <input type="button" value="Carregar dados" onclick="loadData()">
            <input type="button" value="Salvar Dados" onclick="saveFile()">
            <input type="button" value="Enviar dados" onclick="sendFile()">
        </form>

        <br>
        <br>
        <br>
        <div id="rs"></div>
    </body>
</html>
