USE leabergermaturaarbeit;


SELECT * FROM players p
ORDER BY erstellt_am DESC;

SELECT * FROM games g
-- WHERE g.player_id = 16
ORDER BY player_id, runde;

SELECT count(*) as spiele, p.vorname, p.name as nachname, max(g.menge_gewonnen) as gewinn, p.hunger, p.erstellt_am, p.player_id
FROM players p
LEFT JOIN games g
  ON p.player_id = g.player_id
GROUP BY p.player_id
ORDER BY p.erstellt_am DESC;

-- DELETE FROM games;
-- DELETE FROM players;
