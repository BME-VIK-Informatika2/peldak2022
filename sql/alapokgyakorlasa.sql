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
select *
from Termek
order by Ar desc limit 1;
