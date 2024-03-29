<?php

//recupera dados enviados do formulário
$getpost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

switch ($getpost['action']) {
    case "save":

        $txt = $getpost['rsData'];
        $msg = json_decode($getpost['rsData'], true);
        $decifrado = translateMegasse($msg["cifrado"], $msg['numero_casas']);

        $msg['cifrado'] = strtolower($msg['cifrado']);
        $msg['decifrado'] = strtolower($decifrado);
        $msg['resumo_criptografico'] = sha1($decifrado);

        $myfile = fopen("answer.json", "w") or die("Unable to open file!");
        fwrite($myfile, json_encode($msg));
        fclose($myfile);

        echo '
            Parabens deu certo!O <b>arquivo criado</b> com sucesso! | ' . $msg['decifrado'] . '
                
resumo_criptografico: ' . sha1($decifrado);
        break;

    case "send":
        echo var_dump($_FILES);

//        $rs = '{"code":"400","error":"invalid","message":"Invalid content. Body must contain a file with the answer"}';
        echo json_encode($rs);
        break;
}

function translateMegasse($msg, $casas) {
    $letras = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10, 'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14, 'o' => 15, 'p' => 16, 'q' => 17, 'r' => 18, 's' => 19, 't' => 20, 'u' => 21, 'v' => 22, 'w' => 23, 'x' => 24, 'y' => 25, 'z' => 26);
    $letraT = array(1 => 'a', 2 => 'b', 3 => 'c', 4 => 'd', 5 => 'e', 6 => 'f', 7 => 'g', 8 => 'h', 9 => 'i', 10 => 'j', 11 => 'k', 12 => 'l', 13 => 'm', 14 => 'n', 15 => 'o', 16 => 'p', 17 => 'q', 18 => 'r', 19 => 's', 20 => 't', 21 => 'u', 22 => 'v', 23 => 'w', 24 => 'x', 25 => 'y', 26 => 'z');
    $rs = "";
    $cortastring = str_split($msg);

    for ($y = 0; $y < count($cortastring); $y++) {
        if ($cortastring[$y] == ' ' || $cortastring[$y] == ';' || $cortastring[$y] == '.' || $cortastring[$y] == ',') {
            $rs .= $cortastring[$y];
        } else {
            $x = ($letras[$cortastring[$y]] - $casas);

            if ($x < 1) {
                $x = 26 + $x;
            }

            $rs .= $letraT[$x];
        }
    }

    return strtoupper($rs);
}

?>