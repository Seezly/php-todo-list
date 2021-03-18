<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP CRUD</title>

    </head>
    
    <body>

        <h1>PHP CRUD (Another bored to-do list)</h1>

        <section class="add">
        
            <form action="" method="post">
            
                <label for="title">Title:</label>            
                <input type="text" name="title" placeholder="Todo title" required>

                <label for="description">Description:</label>
                <input type="text" name="description" placeholder="Todo description" required>

                <label for="urgency">Urgency:</label>
                <select>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>

                <button type="submit">Add todo</button>

            </form>
        
        </section>

        <section class="todos">
            
            <div class="todo">
            
                <h2></h2>
                <p></p>
                <small></small>
            
            </div>
        
        </section>

    </body>

</html>