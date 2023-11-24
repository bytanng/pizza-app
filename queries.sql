product_id, name, long_desc, short_desc, price, img_path

CREATE TABLE users (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL
);

CREATE TABLE products (
	product_id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	long_desc TEXT NOT NULL,
	short_desc TEXT NOT NULL,
	price DECIMAL(10,2) NOT NULL
	img_path VARCHAR(255) NOT NULL	
);

CREATE TABLE orders (
	order_id INT AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(255) NOT NULL,
	total_price DECIMAL(10, 2) NOT NULL,
	order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	order_status VARCHAR(255) NOT NULL,
	FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE order_details (
	order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
	order_id INT NOT NULL,
	product_id INT NOT NULL,
	quantity INT NOT NULL,
	FOREIGN KEY (order_id) REFERENCES orders(order_id),
	FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE feedback (
	feedback_id INT AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	subject varchar(255) NOT NULL,
	comment TEXT NOT NULL,
	feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('2','Family Combo',
'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust. BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust. Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling. Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world.',
'Hawaiian Pizza, BBQ Chicken Pizza, Cinnamon Bites, Coca-Cola','37.90','images/familycombo.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('3','Party Combo',
'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust. BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust. Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling. Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world. Pepperoni Pizza: A favorite choice among pizza lovers for its delicious combination of cheese, tomato sauce, and pepperoni. BBQ Chicken Pizza: A smoky pizza with seasoned chicken, tomato base, mozarella, red onions, capsicum, and cilantro.',
'Hawaiian Pizza, BBQ Chicken Pizza, Cinnamon Bites, Garlic Bread, Chicken Drumlets,  Coca-Cola','82.90','images/partycombo.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('4','Hawaiian Pizza',
'Hawaiian Pizza: Hawaiian pizza is a savory delight featuring a classic combination of ham, pineapple, and melted cheese on a tomato sauce-covered crust.',
'Hawaiian Pizza','14.90','images/hawaiian.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('5','Pepperoni Pizza',
'Pepperoni Pizza: A favorite choice among pizza lovers for its delicious combination of cheese, tomato sauce, and pepperoni. BBQ Chicken Pizza: A smoky pizza with seasoned chicken, tomato base, mozarella, red onions, capsicum, and cilantro.',
'Pepperoni Pizza','14.90','images/pepperoni.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('6','Cheese Pizza',
'Cheese Pizza: Cheese pizza is a simple yet classic delight, featuring a perfectly baked crust topped with a generous layer of gooey, melted cheese.',
'Cheese Pizza','14.90','images/cheese.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('7','BBQ Chicken Pizza',
'BBQ Chicken Pizza: BBQ chicken pizza is a mouthwatering fusion of tender, barbecue-sauced chicken, red onions, and cheese, creating a smoky and savory flavor explosion on a pizza crust.',
'BBQ Chicken Pizza','14.90','images/bbq.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('8','Seafood Pizza',
'Seafood Pizza: Seafood pizza is a delectable combination of a pizza crust topped with a variety of fresh or cooked seafood, such as shrimp, mussels, and squid, often complemented by a rich tomato sauce and cheese.',
'Seafood Pizza','14.90','images/seafood.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('9','Vegetarian Pizza',
'Vegetarian Pizza: Vegetarian pizza is a flavorful and meat-free option, typically loaded with a variety of colorful vegetables, savory sauces, and melted cheese on a delicious pizza crust.',
'Vegetarian Pizza','14.90','images/vegetarian.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('10','Chicken Drumlets',
'Chicken Drumlets: Fried chicken drumlets coated with tangy barbecue sauce.',
'Chicken Drumlets','8.90','images/drumlets.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('11','Cinnamon Bites',
'Cinnamon Bites: Cinnamon bites are delectable, bite-sized pastries generously coated in cinnamon and sugar, usually served with a sweet glaze for dipping or drizzling.',
'Cinnamon Bites','6.90','images/cinnamon.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('12','Garlic Bread',
'Garlic Bread: Garlic bread is a delectable side dish made from sliced or halved bread, toasted to a golden brown, and generously infused with aromatic, buttery garlic spread.',
'Garlic Bread','6.90','images/garlic.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('13','Large Cola-Cola',
'Coca-Cola: Coca-Cola is a carbonated soft drink known for its refreshing and effervescent taste, with a sweet and slightly tangy flavor, enjoyed by people around the world.',
'Coca-Cola','4.90','images/cola.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('14','Large Sprite',
'Sprite: Sprite is a crisp and refreshing lemon-lime flavored carbonated soft drink known for its zesty and tangy taste, offering a delightful thirst-quenching experience.',
'Sprite','4.90','images/sprite.jpg');

INSERT INTO `products`(`product_id`, `name`, `long_desc`, `short_desc`, `price`, `img_path`)
VALUES ('15','Green Tea',
'Green Tea: Green tea is a fragrant and soothing beverage made from unoxidized tea leaves, prized for its fresh, slightly grassy flavor and a wide range of potential health benefits.',
'Green Tea','5.40','images/greentea.jpg');


