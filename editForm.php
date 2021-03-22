<?php
    if (isset($_GET['title']) && isset($_GET['description']) && isset($_GET['urgency']) && isset($_GET['id'])) {

        $title = $_GET['title'];
        $description = $_GET['description'];
        $urgency = $_GET['urgency'];
        $id = $_GET['id'];
    }

    $title = $_GET['title'];
    $description = $_GET['description'];
    $urgency = $_GET['urgency'];
    $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/normalize.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/503440b251.js" crossorigin="anonymous"></script>
        <title>PHP CRUD</title>

    </head>
    
    <body class="min-vh-100">

        <main class="container-fluid bg-dark text-light min-vh-100 p-5">

            <section class="row">

                <h1 class="mb-5">PHP CRUD (Another bored to-do list)</h1>

                <article class="col-sm-4">
                    <section class="add">
                    
                        <form action="edit.php" method="POST">
                        
                            <label for="title" class="form-label">Title:</label>            
                            <input class="form-control" type="text" name="title" placeholder="Todo title" value=<?php echo $title ?> >

                            <label for="description" class="form-label">Description:</label>
                            <input class="form-control" type="text" name="description" placeholder="Todo description" value=<?php echo $description ?> >

                            <label for="urgency" class="form-label">Urgency:</label>
                            <select class="form-select" name="urgency">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>

                            <input type="hidden" name="id" value=<?php echo $id ?> >
                            <br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary">Edit todo</button>
                            </div>

                        </form>
                    
                    </section>
                </article>

                <article class="todos col-sm-7 offset-1">
                        
                    <div class="todo card col-sm-5" id=<?php echo $id ?>>
                    
                        <div class="card-body">
                            <h2 class="card-title text-primary"><?php echo $title ?></h2>
                            <small class="card-subtitle text-secondary"><?php echo $urgency ?></small>
                            <p class="card-text text-dark"><?php echo $description ?></p>
                        </div>
                    
                    </div>

                </article>

            </section>
        
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <script >
        
            document.getElementByTagName('select')[0].value = <?php echo $urgency ?>;

        </script>

    </body>

</html>