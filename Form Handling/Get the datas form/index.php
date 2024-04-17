<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page form</title>
</head>
<style>
    form{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center; 
        
    }
    div,input{
        margin-top:5px;
    }
</style>
<body >
    
        <form action="formHandling.php" method="post">
            <div>
                <label for="">Enter name:</label><br>
                <input type="text" name="fName" placeholder="first name" required/><br>
                <input type="text" name="lName" placeholder="last name" required/><br>
            </div>
            <div>
                <label for="f">Choose Favourite City In TamilNadu</label><br>
            </div>
            <div>
                <select name="favCity" id="f">
                    <option value="none">None</option>
                    <option value="Coimbatore">Coimbatore</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Tirupur">Tirupur</option>
                </select> <br>
                
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
           


            

        </form>


    
</body>
</html>