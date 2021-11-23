<?php
$xml = simplexml_load_file("xml/tasks.xml");

foreach($xml->dim2->dim3 as $Element) {
    $tasks[] = array(
        'id'             => (string)$Element ->id,
        'tahtaeg'           => (string)$Element->tahtaeg,
        'oppeaine'         => (string)$Element->oppeaine,
        'info'            => (string)$Element->info,
        'task'         => (string)$Element->task
    );
}

if(isset($_POST['submit'])){
    if(!empty($_POST['selectoppeaine'])) {
        foreach($_POST['selectoppeaine'] as $selected){
            if ($selected == 'tahtaeg'){
                usort($tasks, build_sorter('tahtaeg'));
            }
            if ($selected == 'oppeaine'){
                usort($tasks, build_sorter('oppeaine'));
            }
            if ($selected == 'Task'){
                usort($tasks, build_sorter('task'));
            }
        }
    } else {
        echo 'Please select the value.';
    }
}

function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

if (isset($_GET['delete'])) {
    foreach ($xml->dim2 as $task){
        $dom = new DOMDocument;
        $dom->loadXML($xml->asXML());
        $ID = $dom->getElementsByTagName($_GET['delete']);
    }
}

if (isset($_GET['edit'])) {
    echo "edit";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>TODO list</title>
</head>
<body>
<!doctype html>
<html lang="en">
<head>
    <title>Table 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">My Todo-s</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
                    <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
                    <form action="#" method="post">
                        <select class="select" name="selectoppeaine[]">
                            <option value="" selected>Select item</option>
                            <option value="oppeaine">Õppeaine</option>
                            <option value="tahtaeg">tähtaeg</option>
                            <option value="Task">Task</option>
                        </select>
                        <input type="submit" name="submit" value="Choose options">
                    </form>
                </div>
                <div class="table-wrap">
                    <table class="table table-bordered table-dark table-hover">
                        <thead>
                        <tr>
                            <th>Õppeaine</th>
                            <th>Task</th>
                            <th>Info</th>
                            <th>Tähtaeg</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tasks as $Element) :?>
                        <tr>
                            <th scope="row"><?php echo $Element['oppeaine']; ?></th>
                            <td><?php echo $Element['task']; ?></td>
                            <td><?php echo $Element['info']; ?></td>
                            <td><?php echo $Element['tahtaeg']; ?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>