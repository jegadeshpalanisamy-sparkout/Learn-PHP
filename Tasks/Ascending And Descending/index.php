<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        select{
            margin-bottom: 6px;
            height: 37px;
            
        }
    </style>
</head>


<body>
    <div class="container ">
        <h1 class="text-center">Array Sorting</h1>
        <form action="index.php" method="POST">
            <div class="row">
                <div class="col">
                    <input type="text" name="inp1[]" placeholder="array value 1">
                </div>
                <div class="col">
                    <input type="text" name="inp1[]" placeholder="array value 2">
                </div>
                <div class="col">
                    <input type="text" name="inp1[]" placeholder="array value 3">
                </div>
                <div class="col">
                    <!-- Within each row -->
                    <select class="form-select" name="sort1">
                        <option value="asc" >Ascending</option>
                        <option value="desc">Descending</option>
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" name="inp2[]" placeholder="array value 1">
                </div>
                <div class="col">
                    <input type="text" name="inp2[]" placeholder="array value 2">
                </div>
                <div class="col">
                    <input type="text" name="inp2[]" placeholder="array value 3">
                </div>
                <!-- Within each row -->
                <div class="col">
                    <select class="form-select" name="sort2">
                        <option value="asc" >Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
               

            </div>

            <div class="row">
                <div class="col">
                    <input type="text" name="inp3[]" placeholder="array value 1">
                </div>
                <div class="col">
                    <input type="text" name="inp3[]" placeholder="array value 2">
                </div>
                <div class="col">
                    <input type="text" name="inp3[]" placeholder="array value 3">
                </div>
                <!-- Within each row -->
                <div class="col">
                    <select class="form-select" name="sort3">
                        <option value="asc" >Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>

            </div>
            <div class="row text-center w-25 m-auto  mt-2">
                <input type="submit" value="submit" name="submit" class="btn  btn-primary">
            </div>

        </form>

    </div>
    <?php
    if (isset($_POST['submit'])) {
       // var_dump($_POST);
        $rows = [
            ['allValues' => $_POST['inp1'], 'sort' => $_POST['sort1']],
            ['allValues' => $_POST['inp2'], 'sort' => $_POST['sort2']],
            ['allValues' => $_POST['inp3'], 'sort' => $_POST['sort3']]
        ];


        foreach ($rows as &$row) {
            $sortingOrder = $row['sort'] == 'asc' ? SORT_ASC : SORT_DESC;
        
            // Sort the 'allValues' array within each row based on the selected sorting order
            if ($sortingOrder == SORT_ASC) {
                sort($row['allValues']);
            } else {
                rsort($row['allValues']);
            }
        }
        
        echo "<pre>";
        print_r($rows);
        echo "</pre>";
    }
    ?>
</body>

</html>