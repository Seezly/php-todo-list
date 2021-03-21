<?php 

    require 'db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/503440b251.js" crossorigin="anonymous"></script>
        <title>PHP CRUD</title>

    </head>
    
    <body>

        <main>
        
            <h1>PHP CRUD (Another bored to-do list)</h1>

            <section class="add">
            
                <form action="add.php" method="POST">
                
                    <label for="title">Title:</label>            
                    <input type="text" name="title" placeholder="Todo title" required>

                    <label for="description">Description:</label>
                    <input type="text" name="description" placeholder="Todo description" required>

                    <label for="urgency">Urgency:</label>
                    <select name="urgency">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    <button type="submit">Add todo</button>

                </form>
            
            </section>

            <?php
            
                $todos = $conn->query('SELECT * FROM todos ORDER BY id DESC');
            
            ?>

            <section class="todos">
                
                <?php if($todos->rowCount() <= 0){ ?>
                    <div class="todo">
                    
                        <h2>Add a new todo!</h2>
                    
                    </div>
                <?php } ?>

                <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="todo" id=<?php print_r($todo['id']); ?>>
                    
                        <h2><?php echo $todo['title'] ?></h2>
                        <p><?php echo $todo['description'] ?></p>
                        <small><?php echo $todo['urgency'] ?></small>
                        <a href="editForm.php?id=<?php print_r($todo['id']) ?>&title=<?php echo $todo['title'] ?>&description=<?php echo $todo['description'] ?>&urgency=<?php echo $todo['urgency'] ?>" class="edit" id=<?php print_r($todo['id']); ?>>Edit</a>
                        <button class="delete" id=<?php print_r($todo['id']); ?>>Delete</button>
                    
                    </div>
                <?php } ?>

            </section>
        
        </main>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script >

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