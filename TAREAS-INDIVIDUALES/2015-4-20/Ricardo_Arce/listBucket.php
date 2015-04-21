<?php
use Aws\S3\S3Client;

require_once('PATH_TO_API/aws-autoloader.php');

$s3 = S3Client::factory(array(
    'key'=> '',
    'secret'=>'',
    'region'=>'us-west-2'
));

$bucket = 'proyectoweb';

$objects = $s3->getIterator('ListObjects', array(
    "Bucket"=>$bucket/*,
    "Prefix"=>'some_folder/'*/
));

foreach ($objects as $object){
    echo $object['key'] . "<br>";
}

$s3 = new AmazonS3();
$bucket = 'proyectoweb' . strtolower($s3->key);

$response = $s3->get_object_list($bucket);
var_dump(gettype($response) === 'array');
?>
