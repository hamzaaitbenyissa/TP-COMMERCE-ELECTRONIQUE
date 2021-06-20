<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <meta name="author" content="FrontendScript" />

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="view.css">

    <style type="text/css">
    table {
        background: #fff;
    }

    .paging-nav {
        text-align: right;
        padding-top: 2px;
    }

    .paging-nav a {
        margin: auto 1px;
        text-decoration: none;
        display: inline-block;
        padding: 1px 7px;
        background: #480ca8;
        color: white;
        border-radius: 3px;
    }

    .paging-nav .selected-page {
        background: #f72585;
        font-weight: bold;
    }

    .paging-nav,
    #tableData {
        width: 400px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }
    </style>
</head>

<?php require_once ('component.php');?>

<body>

    <?php require_once ("header.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                          include_once('connection.php');

                          $categs = $boutiqueconnect->prepare(
                            "SELECT * FROM categories");
                            $categs->execute();
                            $categories = $categs->fetchAll();
                            $i=0;
                            foreach($categories as $category){
                            //here we can display number of categories we want
                            if(++$i > 12) break;
                            
                            $categ_id=$category['id'];
                            $categ_name=$category['name'];

                           $stmt = $boutiqueconnect->prepare(
                                "SELECT * FROM products
                                INNER JOIN productscategories ON products.id = productscategories.product_id
                                 WHERE productscategories.category_id='$categ_id'
                                 ");

                           $stmt->execute();
                           $products = $stmt->fetchAll();
                           $countcat=count($products);
                           
                            component1($categ_name,$countcat);
                           foreach($products as $product) 
                        {  {
                    component2($product['name'], $product['price'], $product['image'], $product['id']);
                }
            }
        }
            ?>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="paging.js"></script>
</body>

</html>