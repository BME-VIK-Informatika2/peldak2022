use demowebshop;

select v.Nev as VevoNeve,
	sum(mt.db*t.Ar) as Fizetendo, count(*) as TetelekSzama,
    max(t.Ar) LegdragabbTermekDarabAra
from Vevo v
join Megrendeles m
	on v.Id = m.VevoId
join MegrendelesTetel mt
	on mt.MegrendelesId = m.Id
join Termek t
	on mt.TermekId = t.Id
group by v.Nev
order by v.Nev desc;

-- Melyik a legdrágább termék? 
select max(Ar), Nev -- Alam a válasz, de az az első érték és nem a maximum helye...
from Termek;

select *
from Termek
where Ar = ( select max(Ar) from Termek );

-- Rendelések (kosarak) összértéke?
select sum(t.Ar * mt.db), mt.megrendelesid
from termek t
join megrendelestetel mt
	on t.id = mt.termekid
group by mt.megrendelesid;

-- Melyik termékből mennyit rendeltek meg összesen?
select t.id, t.nev, ifnull(sum(mt.db),0) as MegrendeltDb
from termek t
left outer join megrendelestetel mt
	on t.id = mt.termekid
group by t.id, t.nev;
