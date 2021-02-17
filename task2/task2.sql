SELECT w.first_name, w.last_name,
GROUP_CONCAT(DISTINCT ch.name) AS children, c.model
FROM worker w
JOIN car c ON c.user_id = w.id
JOIN child ch ON ch.user_id = w.id
GROUP BY w.id
