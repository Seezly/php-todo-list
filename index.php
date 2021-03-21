<?php 

    require 'db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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