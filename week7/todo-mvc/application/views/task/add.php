<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Tasks</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Add a new To Do</h1>
                <form action="" method="post">
                    <?php if (!empty($feedback) ): ?>
                    <div class="alert alert-success"><?php echo $feedback; ?></div>
                    <?php endif; ?>
                    <?php echo validation_errors(); ?>

                    <div class="form-group">
                        <label for="todo_name">Todo name</label>
                        <input type="text" class="form-control" id="todo_name" name="todo_name">
                        <label for="todo_category">Todo category</label>
                        <input type="text" class="form-control" id="todo_category" name="todo_category">
                    </div>
                    <button type="submit" class="btn btn-primary">Add To Do</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
