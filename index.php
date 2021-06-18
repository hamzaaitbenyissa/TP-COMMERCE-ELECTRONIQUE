<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title> Shopping</title>
</head>
  
<body>
    <div class="container">
        <div class="row">
            <h2>Products</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ref.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
  
                <tbody>
                    <?php 
                           include_once('connection.php');
                           $stmt = $boutiqueconnect->prepare(
                                "SELECT * FROM products");
                           $stmt->execute();
                           $products = $stmt->fetchAll();
                            $i=0;
                           foreach($products as $product) 
                        {
                        if(++$i > 6) break;  
                    ?>
                    
                    <tr>
                        <td>
                            <?php echo $product['id']; ?>
                        </td>
                        <td>
                            <?php echo $product['name']; ?>
                        </td>
  
                        <td>
                            <?php echo $product['price']; ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
  
            <input class="btn btn-link" 
                    type="submit" value="More">
        </div>
    </div>
</body>
  
</html>