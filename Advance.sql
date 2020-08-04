create view view_grouping_products as 
	select
		division.id as division_id,division.name as division_name,
		category.id as category_id,category.name as category_name,
		subcategory.id as subcategory_id, subcategory.name as subcategory_name
	From
		divisionproduct division RIGHT JOIN categoryproduct category ON division.id = category.division_product_id
		RIGHT JOIN subcategoryproduct subcategory ON category.id = subcategory.category_product_id