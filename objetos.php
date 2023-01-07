<?php

function extraer(){
    $file = file_get_contents('data.json');
    $data = json_decode($file, true);
    return $data;
}

function addContent(array $post){
    $data = extraer();
    //obtenemos el ultimo id
    $last_id = end($data)["id"];
    //incrementamos el id
    $last_id++;
    //agregamos el nuevo id
    $post["id"] = $last_id;
    $post["token"] = bin2hex(random_bytes(32));
    //agregamos el nuevo objeto al arreglo
    $data[] = $post;
    //convertimos el arreglo a json
    $data = json_encode($data);
    //guardamos el json en el archivo
    file_put_contents('data.json', $data);

}

function deleteContent($id){
    $info = extraer();
    foreach($info as $key => $value){
        if($value["id"] == $id){
            //remove object with id index with value $id
            unset($info[$key]);
            
        }
    }
    $info = array_values($info);
    $info = json_encode($info);
    file_put_contents('data.json', $info);
}

function getContentById($id){
    $info = extraer();
    foreach($info as $key => $value){
        if($value["id"] == $id){
            return $value;
        }
    }
}

function exportContent($format){
    $data = extraer();
    if($format == 'txt'){
        $content = '| ID | Nombre | Apellido | Edad | Genero |'."\n";
        foreach($data as $key => $value){
            $content .= '| '.$value["id"].' | '.$value["name"].' | '.$value["lastname"].' | '.$value["age"].' | '.$value["gender"].' |'."\n";
        }
    }elseif($format == 'yaml'){
        //convertimos el arreglo a yaml
        $content = yaml_emit($data);
    }
    $file = file_put_contents('archivo.'.$format, $content);
    
    if($file){
        return 'Archivo exportado con exito';
        //download file
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename('archivo.'.$format));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('archivo.'.$format));
        readfile('archivo.'.$format);
        exit;
    }else{
        return 'Error al exportar el archivo';
    }
}

function updateContent(array $post){
    $info = extraer();
    foreach($info as $key => $value){
        if($value["id"] == $post["id"]){
            $info[$key] = $post;
        }
    }
    $info = json_encode($info);
    file_put_contents('data.json', $info);
}

function addToken(){
    $data = extraer();
    foreach($data as $key => $value){
        $token = bin2hex(random_bytes(32));
        $data[$key]["token"] = $token;
    }
    $data = json_encode($data);
    file_put_contents('data.json', $data);

}

?>