<?php

date_default_timezone_set('Asia/Jakarta');
header("Content-Type: text/plain");
use Slim\Http\Request;
use Slim\Http\Response;

define('INACTSERVER', 'inact.interactiveholic.net/bo/');
define('SN_TO_BACKUP','6209212200061');

function isAllowed($getParam){
    $arrBlock = array(
        '\"table\":\"rtstate\"}',
        '"tablename":"ATTPHOTO"',
				'"table":"options"}'
    );

    foreach ($arrBlock as $strBlock) {
        preg_match("/".$strBlock."/",$getParam,$matches);
        if(count($matches)>0){
             return false;
        }
    }
    return true;
}

function isPostAllowed($getParam){
    $arrBlock = array(
        'OPLOG '
    );

    foreach ($arrBlock as $strBlock) {
        preg_match("/".$strBlock."/",$getParam,$matches);
        if(count($matches)>0){
             return false;
        }
    }
    return true;
}

// Routes
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get("/iclock/cdata", function (Request $request, Response $response){
		// $storage = $this->db->prepare("INSERT INTO raw_data SET `get`='testing', `post`='testing', `datetime`='2021-12-14'");
        //$result  = $storage->execute();
    $getarr = $request->getQueryParams();
    $get = json_encode($getarr);
    $datetimenow = date('Y-m-d H:i:s');
    $sn     = $getarr['SN'];
    $stamp  = strtotime('1970-01-01 00:00:00');
    $post   = "get CDATA";
    $get    = json_encode($get);
    if($sn==SN_TO_BACKUP){
        $fileName = "CdataGet-".$sn.".txt";
        
        if (!file_exists($fileName)) {
            $myfile = fopen($fileName, "w");
        }else{
            $myfile = fopen($fileName, "a") or die("Unable to open file!");
        }

        date_default_timezone_set("Asia/Jakarta");
        
        $arrHeader = getallheaders();
        $strHeader = !empty($arrHeader) ? json_encode($arrHeader) : "";
        $txt = date("d-m-Y H:i:s")."\t".$sn."\tcdatapost\n".
        $get."\n".
        $strHeader."\n".
        $post."\n=======================================================================\n";
        fwrite($myfile, $txt);
        fwrite($myfile, $txt);

        fclose($myfile);
    }

    $data = array(
        
    );
            
    $url    = INACTSERVER."api/cdata/cdata_get/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    
    $ch     = curl_init($url);
        
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);
    $option = $BaseResponse;
    
    
    $response->getBody()->write($option);
    
    return $response
          ->withHeader('Content-Type', 'text/plain')
          ->withHeader('Vary', 'Accept-Encoding')
          ->withHeader('Server', 'Apache')
          ->withStatus(200);
          
});

$app->post("/iclock/cdata", function (Request $request, Response $response){
    
    $get        = $request->getQueryParams();
    $sn         = $get['SN'];
        
    $table      = !empty($get['table'])      ? $get['table'] : "";
    $tablename  = !empty($get['tablename']) ? $get['tablename'] : "";

    
    $post       = $request->getBody();
    $datetimenow= date('Y-m-d H:i:s');
    $post       = file_get_contents("php://input");
    
      
    date_default_timezone_set("Asia/Jakarta");
    
    $jsonGet        = json_encode($get);
    
    $sql = "INSERT INTO raw_data SET `get`='$jsonGet', `post`='$post', `datetime`='$datetimenow'";
    
    if(isAllowed($jsonGet)==true  && isPostAllowed($post)==true){
        $storage = $this->db->prepare($sql);
        $result  = $storage->execute();
        if($result==true){
            if(!empty($get["count"]) && !empty($get["tablename"])){
                $BaseResponse = $get["tablename"]."=".$get["count"];
            }else{
                $BaseResponse = "OK";
            }
            return $BaseResponse;
        }
    }else{
        if(!empty($get["count"]) && !empty($get["tablename"])){
            $BaseResponse = $get["tablename"]."=".$get["count"];
        }else{
            $BaseResponse = "OK";
        }
        
        return $BaseResponse;
    }

    
    //$strData = json_encode($arrData);
    //fwrite($myfile, $strData);

    //fclose($myfile);
    
    /*
    
    $data = array(
        'postBody'      => $post,
        'table'         => $table,
        'tablename'     => $tablename,
        'get'           => json_encode($get)
    );
                
    $url    = INACTSERVER."api/cdata/cdata_post/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
            
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);
        
    return $BaseResponse;
    */
});

$app->post("/iclock/cdatates", function (Request $request, Response $response){
    $get        = $request->getQueryParams();
    $sn         = $get['SN'];
    
    $table      = !empty($get['table'])      ? $get['table'] : "";
    $tablename  = !empty($get['tablename']) ? $get['tablename'] : "";

    $post       = $request->getBody();
    $datetimenow= date('Y-m-d H:i:s');
    $post       = file_get_contents("php://input");
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    #===================================================
    
    $path = "C:\\xampp\htdocs\inact\bo\storage\device_raw\\";
    $fileName = $path."POST-".$sn."-".time().".json";
        
    $myfile = fopen($fileName, "w");
        
    date_default_timezone_set("Asia/Jakarta");
        
    $arrData = [
        "datetime"  => $datetimenow,
        "get"       => $get,
        "post"      => $post
    ];

    $strData = json_encode($arrData);
    fwrite($myfile, $strData);

    fclose($myfile);
    
    #===================================================
    /*
    $data = array(
        'postBody'      => $post,
        'table'         => $table,
        'tablename'     => $tablename,
        'get'           => $get
    );
            
    $url    = INACTSERVER."api/cdata/cdata_post/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
        
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);
    
    return $BaseResponse;
    */
});

$app->get("/iclock/getrequest", function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $get = json_encode($getarr);
    $datetimenow = date('Y-m-d H:i:s');
    $sn = $getarr['SN'];
    
    $post ='getrequest';
    
    $arrCek = array(SN_TO_BACKUP);
    // if(in_array($sn, $arrCek)){
    //     $fileName = "getrequest-".$sn.".txt";
    //     $arrHeader = getallheaders();
    //     $strHeader = !empty($arrHeader) ? json_encode($arrHeader) : "";
    //     if (!file_exists($fileName)) {
    //         $myfile = fopen($fileName, "w");
    //     }else{
    //         $myfile = fopen($fileName, "a") or die("Unable to open file!");
    //     }
    //     date_default_timezone_set("Asia/Jakarta");
            
    //     $txt = date("d-m-Y H:i:s")."\t".$sn."\tcdatapost\n".
    //     $get."\n".
    //     $strHeader."\n".
    //     $post."\n=======================================================================\n";
    //     fwrite($myfile, $txt);

    //     fclose($myfile);
    // }

    

    $data = array(
        
    );
            
    $url    = INACTSERVER."api/getrequest/getrequest_get/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    
    $ch     = curl_init($url);
        
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);
    // $BaseResponse = "";
    if($BaseResponse==""){

       if($sn==SN_TO_BACKUP){

            $filePath = "config.json";
            $myfile = fopen( $filePath , "r") or die("Unable to open file!");
            $storageJson =  fread($myfile,filesize($filePath));
            $arrConfig   = json_decode($storageJson);
            if($arrConfig->needBackup>0){
                $BaseResponse = "C:ATTEMPLATE.704652|147803|0:DATA UPDATE BIODATA Pin=1\tNo=0\tIndex=4\tValid=1\tDuress=0\tType=8\tMajorVer=12\tMinorVer=0\tFormat=0\tTmp=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\n";
                $arrConfig->needBackup = 0;
                $newConfig = json_encode($arrConfig);
                $myfile = fopen($filePath, "w") or die("Unable to open file!");
                fwrite($myfile, $newConfig);
                fclose($myfile);
            }
        }
    }

    //$BaseResponse = "C:122:INFO";
    $response->getBody()->write($BaseResponse);
    return $response
            ->withHeader('Content-Type', 'text/plain')
            //->withHeader('Host', '40.90.163.221:80')
            //->withHeader('Cookie', 'token=1ebc9e17b0144f4d65fc365aad144684')
            ->withHeader('Vary', 'Accept-Encoding')
            ->withHeader('Server', 'Apache')
            ->withHeader('Content-Length', strlen($BaseResponse))
            ->withHeader('Connection', 'Keep-Alive')
            ->withStatus(200);
    
});

$app->post("/iclock/devicecmd", function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $post = $request->getBody();
    $sn = $getarr['SN'];
    $datetimenow = date('Y-m-d H:i:s');
    $getarrInput = json_encode($getarr);
    $get        = $request->getQueryParams();
    $get        = json_encode($get);

    $arrCek = array(SN_TO_BACKUP);
    
    if(in_array($sn, $arrCek)){
        $fileName = "deviceCMd-".$sn.".txt";
        
        if (!file_exists($fileName)) {
            $myfile = fopen($fileName, "w");
        }else{
            $myfile = fopen($fileName, "a") or die("Unable to open file!");
        }
        date_default_timezone_set("Asia/Jakarta");
            
        $txt = date("d-m-Y H:i:s")."\t".$sn."\tcdatapost\n".
        $get."\n".
        $post."\n=======================================================================\n";
        fwrite($myfile, $txt);

        fclose($myfile);
    }

    $data = array(
       "postBody" => $post,
       'get'      => $getarrInput
    );
    
    $url    = INACTSERVER."api/devicecmd/devicecmd_post/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);

    return $BaseResponse;
});

$app->post("/iclock/registry",function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $get = json_encode($getarr);
    $post = $request->getBody();
    $sn = $getarr['SN'];
    $datetimenow = date('Y-m-d H:i:s');
    $getarrInput = json_encode($getarr);
    //$sql = "INSERT INTO request (`post`, `get`, `datecreated`) VALUES ('$post', '$getarrInput', '$datetimenow')";
    //$stmt = $this->db->prepare($sql);
    //$stmt->execute();
    /*
    $fileName = "registry-".$sn.".txt";
        
        if (!file_exists($fileName)) {
            $myfile = fopen($fileName, "w");
        }else{
            $myfile = fopen($fileName, "a") or die("Unable to open file!");
        }
        date_default_timezone_set("Asia/Jakarta");
        $result = getallheaders();
        $headers = (json_encode($result));
        $txt = date("d-m-Y H:i:s")."\t".$sn."\tcdatapost\n".
        $get."\n".
        $headers."\n".
        $post."\n=======================================================================\n";
        fwrite($myfile, $txt);

        fclose($myfile);
    */
    $data = array(
       "postBody" => $post
    );
            
    $url    = INACTSERVER."api/registry/registry_post/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    echo $BaseResponse = curl_exec($ch);
    $obj          = json_decode($BaseResponse);

    curl_close($ch);
    $response->getBody()->write($obj->response);
    return $response
            ->withHeader('Set-Cookie', 'JSESSIONID='.$obj->sessionid);
});

$app->post("/iclock/push",function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $post = $request->getBody();
    $sn = $getarr['SN'];
    $datetimenow = date('Y-m-d H:i:s');
    $getarrInput = json_encode($getarr);
    //$sql = "INSERT INTO request (`post`, `get`, `datecreated`) VALUES ('$post', '$getarrInput', '$datetimenow')";
    //$stmt = $this->db->prepare($sql);
    //$stmt->execute();
    
    $data = array(
       "postBody" => $post,
       "sessionID" => hash("sha1", date("YmdHis"))
    );
            
    $url    = INACTSERVER."api/push/push_post/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);

    return $BaseResponse;
});

$app->get("/iclock/rtdata",function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $post = $request->getBody();
    $sn = $getarr['SN'];
    $datetimenow = date('Y-m-d H:i:s');
    $getarrInput = json_encode($getarr);
    
    $data = array(
       "postBody" => $post,
       "sessionID" => hash("sha1", date("YmdHis"))
    );
            
    $url    = INACTSERVER."api/rtdata/rtdata_get/3fed48151b389b691898cc2a046772bfa040dadb49aac02fe7b7c2f8d891dfc9-".$sn;
    $ch     = curl_init($url);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $BaseResponse = curl_exec($ch);
    curl_close($ch);

    return $BaseResponse;
});

$app->get("/iclock/ping", function (Request $request, Response $response){
    
    $response->getBody()->write("OK");
    
    return $response
          ->withHeader('Content-Type', 'text/plain')
          ->withHeader('Vary', 'Accept-Encoding')
          ->withHeader('Server', 'Apache')
          ->withHeader('Content-Length', '2')
          ->withStatus(200);
          
});

$app->post("/iclock/querydata",function (Request $request, Response $response){
    $getarr = $request->getQueryParams();
    $post   = $request->getBody();
    $sn     = $getarr['SN'];
    $count  = !empty($getarr['count']) ? $getarr['count'] : 999;
    $datetimenow = date('Y-m-d H:i:s');
    $getarrInput = json_encode($getarr);
    if($sn==SN_TO_BACKUP){
        $fileName = "backup-data-log-".$sn.".txt";
        
        if (!file_exists($fileName)) {
            $myfile = fopen($fileName, "w");
        }else{
            $myfile = fopen($fileName, "a") or die("Unable to open file!");
        }

        date_default_timezone_set("Asia/Jakarta");
        
        $txt = $post."\n";
        fwrite($myfile, $txt);

        fclose($myfile);
    }
    return "transaction=".$count;
});
/*
if(!empty($_GET["SN"]) && $_GET["SN"]==SN_TO_BACKUP){
    $sn = $_GET["SN"];
    $fileName = "semuatrace-".$sn.".txt";
    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (!file_exists($fileName)) {
        $myfile = fopen($fileName, "w");
    }else{
        $myfile = fopen($fileName, "a") or die("Unable to open file!");
    }

    date_default_timezone_set("Asia/Jakarta");
    $post = file_get_contents("php://input");
    $txt = date("d-m-Y H:i:s")."\t".$sn."\tcdatapost\n".
    $url."\n".
    $post."\n=======================================================================\n";
    fwrite($myfile, $txt);

    fclose($myfile);
}
*/