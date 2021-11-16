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
if (isset($_POST['Task'])){
    usort($tasks, build_sorter('task'));
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
    <link rel="stylesheet" href="css/style.css">
    <title>TODO list</title>
</head>
<body>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
          <div class="card-body py-4 px-4 px-md-5">

            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
              <i class="fas fa-check-square me-1"></i>
              <u>My Todo-s</u>
            </p>

            <div class="pb-2">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Add new...">
                    <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i class="fas fa-calendar-alt fa-lg me-3"></i></a>
                    <div>
                      <button type="button" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
              <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
              <select class="select">
                <option value="1">Õppeaine</option>
                <option value="2">tähtaeg</option>
                <option value="3">Task</option>
              </select>
              <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i class="fas fa-sort-amount-down-alt ms-2"></i></a>
            </div>

            <?php foreach ($tasks as $Element) :?>

            <ul class="list-group list-group-horizontal rounded-0 bg-transparent">
              <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                <div class="form-check">
                  <input
                    class="form-check-input me-0"
                    type="checkbox"
                    value=""
                    id="flexCheckChecked1"
                    aria-label="..."
                  />
                </div>
              </li>
              <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0"><p class="text-muted"><?php echo $Element['oppeaine']; ?></p> <?php echo $Element['task']; ?></p>
              </li>
              <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                <div class="text-end text-muted">
                    <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="<?php echo $Element['info']; ?>">
                      <p class="small mb-0"><i class="fas fa-info-circle me-2"></i>More info</p></a>
                  </div>
              </li>
              <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                <div class="py-2 px-3 me-2 border border-warning rounded-3 d-flex align-items-center bg-light">
                  <p class="small mb-0">
                    <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                      <i class="fas fa-hourglass-half me-2 text-warning"></i>
                    </a>
                    <?php echo $Element['tahtaeg']; ?>
                  </p>
                </div>
              </li>
              <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                <div class="d-flex flex-row justify-content-end mb-1">
                  <a href="#!" class="text-info" data-mdb-toggle="tooltip" title="Edit todo"><i class="fas fa-pencil-alt me-3"></i></a>
                  <a href="#!" class="text-danger" data-mdb-toggle="tooltip" title="Delete todo"><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="text-end text-muted">
                  <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                    <p class="small mb-0"><i class="fas fa-info-circle me-2"></i><?php echo $Element['kuupaev']; ?></p></a>
                </div>
              </li>
            </ul>

            <?php endforeach;?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
