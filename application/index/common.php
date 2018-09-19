<?php
/**
 * Created by PhpStorm.
 * User: ztc
 * Date: 2018-07-05
 * Time: 15:28
 */
function vd($data){
    var_dump($data);
    die;
}

function ReturnJson($code=0,$msg='',$data=[]){
    return json(['code'=>$code,'msg'=>$msg,'data'=>$data]);
}


function WebClient($url='',array $options=array()){
    if(stripos($url,'?wsdl')!== false)
    {
        return new \SoapClient($url,array_merge(array('encoding'=>'utf-8'),$options));//WSDL
    }
    else
    {
        $location = "http://www.vehicle.com/";
        $uri = "index/index/index";
        $options = array_merge(array('location'=>$location,'uri'=>$uri,'encoding'=>'utf-8'),$options);
        return new \SoapClient(null,$options);//non-WSDL
    }
}