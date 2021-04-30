select P.name as "nome do produto", A.id as "id do armazém", 
I.amount_in_stock as "estoque atual", I.reorder_point as "ponto de ressuprimento",
R.name as "região do armazém", M.first_name ||' '|| M.last_name as "gerente"
from s_product as P, s_warehouse as A, s_inventory as I, s_emp as M, s_region as R
where(I.amount_in_stock<I.reorder_point and I.product_id=P.id 
	  and I.warehouse_id = A.id and M.id = A.manager_id and R.id = A.region_id);
