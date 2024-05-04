<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Recipe</title>

    <style>
        #itemBoxWrapper{
            padding: 10px;
            margin: 5px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.08);
            width: 50%;
        }

        #search{
            resize: none;
            font-size: 15px;
            font-weight: 600;
            color: #000000;
            text-decoration: none;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 35px;
            line-height: 30px;
            height: 40px;
            padding-left: 20px;
            width: 75%;
        }

        #items {
            margin: 20px;
            margin: 20px;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            /* This is for the grid layout so that the recipes load in a 3 column per row layout  */
            gap: 20px;
        }

        .item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        #itemImage {
            width: 100%;
            height: 100px;
            object-fit: cover;
            opacity: 0.9;
            /* -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 1)), to(rgba(0, 0, 0, 0)));
            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0)); */
        }


        #itemInformation {
            padding: 20px;
        }

        #itemHeading {
            font-family: "acumin-pro-wide", "Acumin Pro Wide", "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding-top: 20px;
            padding-left: 20px;
            font-size: 25px;
            font-weight: 500;
        }

        #addButton{
            display: inline-block;
            padding: 5px 20px;
            background-color: #eff7ff;
            font-size: 15px;
            font-weight: 600;
            color: #006eff;
            text-decoration: none;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 35px;
            margin-right: 8px;
            margin-left: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        #addButton:hover { 
            background-color: #d4e7ff; 
            cursor: pointer;
        }
</style>
</head>
<body>

    <h1>Create Recipe</h1>
    <form action="/Recipe/create" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>
        
        <label for="duration">Duration:</label><br>
        <input type="text" id="duration" name="duration" required><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" required><br><br>

        <div id="itemsInRecipe">
            
        </div>
        
        <label for="privacy_status">Privacy:</label><br>
        <select id="privacy_status" name="privacy_status">
            <option value="public">Public</option>
            <option value="private">Private</option>
        </select><br><br>
        
        <button type="submit">Continue</button>
    </form>
    </script>
</body>


</html>