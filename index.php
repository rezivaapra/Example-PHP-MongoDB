<?php

    require 'vendor/autoload.php';

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $friends = $client->test->friends;
    $result = $friends->find(array(), array('projection' => array('_id' => false)));

    $data = iterator_to_array($result);
    
?>

<html>
<body>
<table>
    <thead>
        <tr>
        <?php foreach ($data[0] as $key => $value): ?>
            <th> 
                <?php echo $key ?> 
            </th>
        <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <?php foreach ($row as $key => $value): ?>
                    <td> 
                        <?php echo $value ?> 
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>