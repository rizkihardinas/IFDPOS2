create view view_grouping_products as 
	select
		division.id as division_id,division.name as division_name,
		category.id as category_id,category.name as category_name,
		subcategory.id as subcategory_id, subcategory.name as subcategory_name
	From
		divisionproduct division RIGHT JOIN categoryproduct category ON division.id = category.division_product_id
		RIGHT JOIN subcategoryproduct subcategory ON category.id = subcategory.category_product_id

CREATE VIEW v_products as
	SELECT 
	view_grouping_products.*,
	products.*,
	brand.name as brand,
	suppliers.name as supplier,
	unit.name as unit,
	producttype.name as type
	FROM view_grouping_products 
	JOIN products ON view_grouping_products.subcategory_id = products.sub_category_id
	JOIN brand ON brand.id = products.brand_id
	JOIN suppliers ON suppliers.id = products.suppliers_id
	JOIN unit ON unit.id = products.unit_id
	JOIN producttype ON producttype.id = products.type_product_id

CREATE VIEW  view_price_detail aS SELECT price.name,IFNULL(pricedetail.price,0) as price,IFNULL(pricedetail.products_id,0) as products_id FROM `price` LEFT JOIN pricedetail ON price.id = pricedetail.price_id
