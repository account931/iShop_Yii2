IShop Yii2

1.We use our custom layout design, we changed it in view/layout/main.php. Original Yii layout is stored in main_Original.php. To get the original view - rename main_Original.php to main.php.

2.All available products are in Products Sql DB, we display this DB content in view/shop.php, forming the id of each item by construction {product name + price}. We need such id, to manipulate the data in JS module window, when u click on a product(split the id and get each array element). Module window (single product pop-up) is One for all products, we just html() it with relevant data from the id clicked.

3.All selected products are added to JS Object; when u visit CART, object elements are dynamically displayed, Total sum is calculated.

4.When in Cart u click CheckOut (Place an Order), JS Object parsed to string and send by JS Ajax to Yii Controller, parses by php and added to Orders Sql.
Client side JS Object is cleared and set to empty.