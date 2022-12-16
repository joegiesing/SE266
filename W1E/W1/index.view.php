<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>

        header{
            background: #e3e3e3;
            padding: 2em;
            text-align: center;
        }

    </style>
</head>
<body>
    <ul>

        <li> <strong> Title: </strong> <?=$task['Title']; ?> </li>

        <li> <strong> Due Date: </strong> <?=$task['Due']; ?> </li>

        <li> <strong> Assigned To: </strong> <?=$task['Assigned To']; ?> </li>

        <li> 
            <strong> Completed: </strong> 
        
            <?php if ($task['Completed']) : ?>

                <span class="icon">&#9989;</span>
                
            <?php else : ?>
                
                <span>Incomplete</span>
                
            <?php endif ?>
        </li>

    </ul>
</body>
</html>
