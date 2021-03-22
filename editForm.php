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
        <link rel="stylesheet" href="./css/normalize.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/503440b251.js" crossorigin="anonymous"></script>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <script >
        
            document.getElementByTagName('select')[0].value = <?php echo $urgency ?>;

        </script>

    </body>

</html>