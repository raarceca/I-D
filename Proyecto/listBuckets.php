<?php
require 'aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$bucket = 'CentralReveladosServer';

// Instantiate the client.
$s3 = S3Client::factory(
array('credentials' => array(
    'key'    => 'AKIAJNALDIJ36AKOEKZQ',
    'secret' => '6Merce3dBQh8biI6S/wgPw97IrvG/KEvM+mAfj+B',

)));

// Use the high-level iterators (returns ALL of your objects).
try {
$objects = $s3->getIterator('ListObjects', array(
'Bucket' => $bucket
));

echo "Keys retrieved!\n"; ?>
  <html>
<body>
<h3>Listado de Buckets</h3>
<table>
    <tr>
        <td> <b>Objeto</b> </td>
    </tr>
        <?php
        foreach ($objects as $object) {
            echo '<tr>';
            echo  '<td>'.$object['Key'] .'<td>';
            echo '</tr>';
        }
        } catch (S3Exception $e) {
            echo $e->getMessage() . "\n";
        }
        ?>


</table>

    </body>
    </html>

