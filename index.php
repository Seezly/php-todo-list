<?php 

    require 'db_connection.php';

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
                    
                        <form action="add.php" method="POST">
                        
                            <label for="title" class="form-label">Title:</label>
                            <br>
                            <input class="form-control" type="text" name="title" placeholder="Todo title" required>
                            <br>
                            <label for="description" class="form-label">Description:</label>
                            <br>
                            <input class="form-control" type="text" name="description" placeholder="Todo description" required>
                            <br>
                            <label for="urgency" class="form-label">Urgency:</label>
                            <br>
                            <select class="form-select" name="urgency">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary">Add todo</button>
                            </div>

                        </form>
                    
                    </section>
                </article>

                <?php
                
                    $todos = $conn->query('SELECT * FROM todos ORDER BY id DESC');
                
                    ?>

                <article class="todos col-sm-7 offset-1">
                    <?php if($todos->rowCount() <= 0){ ?>
                        <div class="todo card col-sm-3">
                        
                        <div class="card-body">
                            <h2 class="card-title text-primary">Add a new todo!</h2>
                        </div>
                        
                        </div>
                    <?php } ?>
    
                    <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div class="todo card col-sm-3" id=<?php print_r($todo['id']); ?>>
                            <div class="card-body">
                                <h2 class="card-title text-primary"><?php echo $todo['title'] ?></h2>
                                <small class="card-subtitle text-secondary"><?php echo $todo['urgency'] ?></small>
                                <p class="card-text text-dark"><?php echo $todo['description'] ?></p>
                                <br>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-warning" href="editForm.php?id=<?php print_r($todo['id']) ?>&title=<?php echo $todo['title'] ?>&description=<?php echo $todo['description'] ?>&urgency=<?php echo $todo['urgency'] ?>" class="edit" id=<?php print_r($todo['id']); ?>>Edit</a>
                                    <button class="delete btn btn-danger" id=<?php print_r($todo['id']); ?>>Delete</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </article>

            </section>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        
        <script>

            const remove = document.getElementsByClassName('delete');

            [...remove].forEach(el => {

                const id = el.id;

                const data = new FormData();

                data.append('id', id);
                
                el.addEventListener('click', () => {
                    fetch('delete.php', {
                        method: 'POST',
                        body: data
                    })
                    .then(res => console.log(res));
                });
            });
        
        </script>

    </body>

</html>