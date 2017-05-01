# Webshop SQL API

## Cart
The following procedures are available for cart management

### addToCart(theID, customerID)
Add a product to the customer's cart

#### Params
**theID**
The id of the product to be added to the cart
**customerID**
The id of the customer that added the item to their cart

###  deleteFromCart(theID, customerID)
Delete a product to the customer's cart

#### Params
**theID**
The id of the product to be removed from the cart
**customerID**
The id of the customer that removed the item from their cart

###  getCart(customerID)
Get the customer's cart

#### Params
**customerID**
The id of the customer that is viewing the cart

## Order
The following procedures are available for order management

### placeOrder(customer)
Place an order

#### Params
**customer**
The id of the customer that is placing the order

### deleteOrder(number)
Delete an order

#### Params
**number**
The order number

### getOrder(number)
Get details of an order

#### Params
**number**
The order number

## Inventory Log
There's a procedure for viewing the inventory/stockout log. The log is created automatically and logs products which inventory status is below the amount of 5.

### getStockoutLog()
Display all products with an inventory amount below 5, and the time when it dropped blow said number.
