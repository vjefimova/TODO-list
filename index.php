<?php
$xml = simplexml_load_file("tasks.xml");

foreach($xml->dim2->dim3 as $Element) {
    $tasks[] = array(
        'id'             => (string)$Element ->id,
        'kuupaev'          => (string)$Element->kuupaev,
        'tahtaeg'           => (string)$Element->tahtaeg,
        'oppeaine'         => (string)$Element->oppeaine,
        'info'            => (string)$Element->info,
        'task'         => (string)$Element->task
    );
}

if (isset($_POST['tahtaeg'])){
    usort($tasks, build_sorter('tahtaeg'));
}
if (isset($_POST['oppeaine'])){
    usort($tasks, build_sorter('oppeaine'));
}
if (isset($_POST['Info'])){
    usort($tasks, build_sorter('info'));
}

function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TODO list</title>
</head>
<body>
<form method="post" action="">
    <input type="submit" value="Sort by tähtaeg" name="tahtaeg">
    <input type="submit" value="Sort by Õppeaine" name="oppeaine">
    <input type="submit" value="Sort by Info" name="Info">
</form>
<table>
  <thead>
    <tr>
        <th>Õppeaine</th>
        <th>Info</th>
        <th>Task</th>
        <th>kuupaev</th>
        <th>tähtaeg</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($tasks as $Element) :?>
    <tr>
      <td><?php echo $Element['oppeaine']; ?></td>
      <td><?php echo $Element['info']; ?></td>
      <td><?php echo $Element['task']; ?></td>
      <td><?php echo $Element['kuupaev']; ?></td>
      <td><?php echo $Element['tahtaeg']; ?></td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
</body>
