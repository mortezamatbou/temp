SELECT c.title, COUNT(fc.film_id) AS count 
FROM films_categories AS fc
JOIN categories AS c ON c.id=fc.category_id
GROUP BY fc.category_id;

SELECT c.title, f.title, (SELECT MAX(f2.score) FROM films AS f2 WHERE f2.id=f.id)
FROM categoris AS c
LEFT JOIN flims_categories AS fc ON fc.id=fc.category_id
JOIN flims AS f ON f.id=fc.film_id
GROUP BY fc.category_id

SELECT title FROM films ORDER BY score DESC LIMIT 1
