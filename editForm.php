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

    var_dump($_GET);

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
            
                <form action="edit.php" method="POST">
                
                    <label for="title">Title:</label>            
                    <input type="text" name="title" placeholder="Todo title" value=<?php echo $title ?> >

                    <label for="description">Description:</label>
                    <input type="text" name="description" placeholder="Todo description" value=<?php echo $description ?> >

                    <label for="urgency">Urgency:</label>
                    <select name="urgency">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    <input type="hidden" name="id" value=<?php echo $id ?> >

                    <button type="submit">Edit todo</button>

                </form>
            
            </section>

            <section class="todos">
                
                <div class="todo" id=<?php echo $id ?>>
                
                    <h2><?php echo $title ?></h2>
                    <p><?php echo $description ?></p>
                    <small><?php echo $urgency ?></small>
                
                </div>

            </section>
        
        </main>

        <script >
        
            document.getElementByTagName('select')[0].value = <?php echo $urgency ?>;

        </script>

    </body>

</html>