<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Todo's</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Your To-Dos</h1>
                <button type="button" class="btn btn-danger">You have <?php echo $todos->num_rows(); ?> to-dos</button>
                <ul class="list-group">
                    <?php foreach ($todos->result() as $todo): ?>
                        <li class="list-group-item"><span class="badge">
                                <?php echo $todo->category; ?></span><?php echo $todo->name; ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="add"><button class="btn btn-primary">Add To-Dos</button></a>
            </div>
        </div>
    </div>
</body>
</html>