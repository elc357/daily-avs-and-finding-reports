
CREATE DATABASE MCC_PM3;

USE MCC_PM3;

SHOW TABLES;

CREATE TABLE MCC_MASTER (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  power int unsigned DEFAULT NULL,
  ampere int unsigned DEFAULT NULL,
  pole int unsigned DEFAULT NULL,
  funcloc varchar(100) DEFAULT NULL,
  PRIMARY KEY (id)
);

insert into MCC_7
(name, power, ampere, pole, funcloc) values
("H-06", 110, 205, 4, "FP-01-PM3-HOO-BL06"),
("H-07", 110, 205, 4, "FP-01-PM3-HOO-BL07"),
("H-08", 110, 205, 4, "FP-01-PM3-HOO-BL08"),
(null, null, null, null, null);

select * from mcc_7;

 insert into MCC_6
 (name, power, ampere, pole, funcloc) values
 ("P-84-A", 75, 137, 2, "FP-01-PM3-WRS-T033-P056"),
 ("P-57", 75, 139, 4, "FP-01-PM3-WRS-T033-P059"),
 (null, null, null, null, null),
 ("V-06", 132, 250, 6, "FP-01-PM3-VAS-VP06"),
 ("P-26", 132, 227, 4, "FP-01-SP3-APS-T021-P035"),
 (null, null, null, null, null),
 ("BR-07-B", 75, 143, 6, "FP-01-PM3-BRS-T039-A023"),
 ("P-55", 75, 134, 2, "FP-01-PM3-WRS-T033-P053"),
 ("P-84", 90, 159, 2, "FP-01-PM3-WRS-T033-P054"),
 ("P-38", 55, 103, 4, "FP-01-SP3-BRS-T026-P039"),
 (null, null, null, null, null),
 (null, null, null, null, null);
 
 select * from mcc_6;
 
insert into MCC_5
(name, power, ampere, pole, funcloc) values
("BR-06", 75, 143, 6, "FP-01-PM3-BRS-T038-A021"),
("AG-28", 90, 171, 6, "FP-01-SP3-BRS-T027-A019"),
(null, null, null, null, null),
(null, null, null, null, null),
("BR-01", 110, 210, 4, "FP-01-PM3-BRS-T037-A020"),
(null, null, null, null, null),
("P-31", 90, 165, 4, "FP-01-PM3-BRS-T038-P062"), 
("P-32", 110, 205, 4, "FP-01-PM3-BRS-T039-P064"),  
("V-05", 75, 143, 6, "FP-01-PM3-VAS-VP05"),  
("P-33", 132, 242, 4, "FP-01-PM3-BRS-T040-P065"),
("P-34", 110, 210, 4, "FP-01-PM3-BRS-T041-P066"), 
(null, null, null, null, null);

select * from mcc_5;

create table MCC_3 like mcc_master;

insert into MCC_3
(name, power, ampere, pole, funcloc) values
("P-81", 30, 61, 4, "FP-01-PM3-WRS-T034-P057"),
("Power Air Dryer", null, null, null, null),
("V-09", 15, 30, 6, "FP-01-PM3-VAS-VP09"),
("Power Traversing", null, null, null, null),
(null, null, null, null, null),
("Power RO Reverse Osmosis", null, null, null, null),
("C-20", 1.1, 2.1, 4, "FP-01-CH3-STA-SR18"),

("SD-02", 18.5, 36, 4, "FP-01-PM3-STC-T050-P089"),
("Power M-Clean Lama", null, null, null, null),
("IM-0D", null, null, null, null),
("IM-51D", null, null, null, null),
("MDFC1", null, null, null, null),
("MDFC2", null, null, null, null),
("C-20", 1.1, 2.1, 4, "FP-01-CH3-STA-SR18"),

("SD-01", 18.5, 37.6, 4, "FP-01-PM3-STC-T050-P088"),
("IM-10D", null, null, null, null),
("IM-35D", null, null, null, null),
(null, null, null, null, null),
("MDFC3", null, null, null, null),
("MDFC4", null, null, null, null),
("C-18", 1.1, 2.1, 4, "FP-01-CH3-STA-SR16"),

("IM-21D", null, null, null, null),
("Power Submersible Finishing", null, null, null, null),
("AC UCI000305", null, null, null, null),
("Power Hyd Circulation", null, null, null, null),
("C-19", 1.1, 2.1, 4, "FP-01-CH3-STA-SR17"),
("C-21", 4, 9.1, 4, "FP-01-CH3-STA-T105-A033"),
("Primary Arm Pope Reel", null, null, null, null),

("MK-35", null, null, null, null),
("AC Drive", null, null, null, null),
(null, null, null, null, null),
("Power Chemical Bawah", null, null, null, null),
("MK-34", null, null, null, null),
("Power Roll Handling", null, null, null, null),
(null, null, null, null, null);

select * from mcc_3;

desc mcc_2;

insert into MCC_2
(name, power, ampere, pole, funcloc) values

("P-59", 45, 86, 4, "FP-01-PM3-VAS-T070-P070"),
("P-87", 55, 108, 4, "FP-01-PM3-WRS-T036-P075"),
("IM-OM1", 7.5, 15, 4, "FP-01-PM3-HYD-T096-P104"),
("Osc Breast Roll", null, null, null, null),
("Power Nalco", null, null, null, null),
(null, null, null, null, null),
("Lub Dryer L-05 & L-04", null, null, null, null),

("P-79", 45, 86, 4, "FP-01-PM3-VAS-T072-P072"),
("IM-OM2", 7.5, 15, 4, "FP-01-PM3-HYD-T096-P105"),
("Power Caustic Soda", null, null, null, null),
("P-54", 45, 93, 4, "FP-01-PM3-WRS-T033-P052"),
("Lubrication Pope Reel", null, null, null, null),
("H-09", 3.7, 9.5, 2, "FP-01-PM3-HOO-BL09"),
(null, null, null, null, null),

("P-80", 45, 86, 4, "FP-01-PM3-WRS-T033-P055"),
("P-82", 22, 44, 4, "FP-01-PM3-WRS-T035-P058"),
("SD-04", 11, 23, 4, "FP-01-PM3-STC-T054-P091"),
("IM-1PT", 0.4, 1.1, 4, "FP-01-PM3-WET-PRS1-PSRT/P1T"),
("IM-1PB", 0.4, 1.1, 4, "FP-01-PM3-WET-PRS1-PSRB/P1B"),
("H-04", 37, 72.7, 4, "FP-01-PM3-HOO-BL04"),
("IM-2PT", 0.4, 1.1, 4, "FP-01-PM3-WET-PRS2-PSRT/P2T"),

("Lub Dryer L-06 & L-03", null, null, null, null),
("P-67", 4, 8.6, 4, "FP-01-PM3-VAS-T061-P069"),
("P-74", 30, 59, 4, "FP-01-PM3-VAS-T073-P074"),
("IM-2PB", 0.4, 1.1, 4, "FP-01-PM3-WET-PRS2-PSRB/P2B"),
("IM-PPR", 0.4, 1.1, 4, null),
("Cleaning Pump", null, null, null, null),
("H-10", 3.7, 9.5, 2, "FP-01-PM3-HOO-BL10-EXH"),

("Power Trim Cutter B", null, null, null, null),
("Power Area AP-01", null, null, null, null),
("P-73", 30, 59, 4, "FP-01-PM3-VAS-T073-P073"),
("Power Buckman PM7", null, null, null, null),
("AG-82", 3.7, 8.8, 6, "FP-01-PM3-WRS-T076-GB"),
(null, null, null, null, null),
("H-11", 3.7, 9.5, 2, "FP-01-PM3-HOO-BL11-EXH"),

("Power Kemira", null, null, null, null),
("P-69", 4, 8.6, 4, "FP-01-PM3-VAS-T060-P068"),
("H-01", 37, 72.7, 4, "FP-01-PM3-HOO-BL01-EXH"),
("AG-81", 3.7, 8.8, 6, "FP-01-PM3-WRS-T075-GB"),
("C-22", 11, 21.5, 4, "FP-01-CH3-STA-T105-P116"),

("H-02", 55, 105, 4, "FP-01-PM3-HOO-BL02-EXH"),
("H-03", 55, 105, 4, "FP-01-PM3-HOO-BL03-EXH"),
("H-05", 55, 105, 4, "FP-01-PM3-HOO-BL05-EXH"),
("H-12", 55, 105, 4, "FP-01-PM3-HOO-BL12-EXH"),
("V-01", 37, 71, 2, "FP-01-PM3-VAS-VP01"),
(null, null, null, null, null),
(null, null, null, null, null);

select * from mcc_2;

create table MCC_1 like MCC_MASTER;

desc MCC_1;

insert into MCC_1
(name, power, ampere, pole, funcloc) values

("P-35", 22, 44, 4, "FP-01-SP3-BRS-T027-P040"),
("BR-07-A", 75, 143, 6, "FP-01-PM3-BRS-T039-A023"),
(null, null, null, null, null),
("AG-27", 22, 46.4, 6, "FP-01-SP3-BRS-T026-A018"),
("P-30", 22, 42, 4, "FP-01-PM3-APS-T031-P047"),
(null, null, null, null, null),
("P-25", 30, 58, 6, "FP-01-SP3-APS-T020-P034"),

("P-47", 7.5, 15.2, 4, "FP-01-PM3-BRS-T037-P061"),
("BR-05", 7.5, 15.7, 4, "FP-01-SP3-BRS-TH09-GB1"),
("Cooling Oil Gearbox", null, null, null, null),
("P-36", 45, 86, 4, "FP-01-SP3-BRS-T027-P041"),
("P-06", 15, 30, 4, "FP-01-PM3-APS-T031-P045"),
("P-46", 45, 86, 4, "FP-01-PM3-BRS-T038-P063"),
("P-40", 18.5, 36, 4, "FP-01-PM3-APS-T031-P048"),

("P-78", 37, 71, 4, "FP-01-SP3-RJS-T017-P029"),
("P-29", 7.5, 15.2, 4, "FP-01-PM3-APS-T031-P046"),
("P-28", 22, 48, 4, "FP-01-SP3-APS-T022-P036"),
("AP-03", 22, 44.3, 4, "FP-01-PM3-APS-SR14"),
("SD-03", 11, 23, 4, "FP-01-PM3-STC-T051-P090"),
("AP-02", 30, 63.2, 6, "FP-01-SP3-APS-T023-P037"),
("P-51", 11, 22, 4, "FP-01-PM3-STC-T051-P090"),

("P-72", 55, 105, 4, "FP-01-FP-01-PM3-WRS-T102-P110"),
("AG-22", 55, 108, 6, "FP-01-SP3-APS-T021-A017"),
("P-58", 55, 99, 2, "FP-01-PM3-WRS-T036-P060"),
("BR-04", 55, 105, 4, "FP-01-SP3-BRS-SR15"),
(null, null, null, null, null),
(null, null, null, null, null),
(null, null, null, null, null);

show tables;

use mcc_pm3;

-- +=+=+=+=+=+=+=+=+ AVS PM3 +=+=+=+=+=+=+=+=+ -- 

CREATE TABLE AVS_MCC_1 (
id int not null primary key,
ampere float unsigned default 0,
temperature float unsigned default 0,
checked_by varchar(255),
constraint fk_avs_mcc_1 foreign key (id) references mcc_1(id));

CREATE TABLE AVS_MCC_7 (
ampere float default 0,
temperature float default 0,
primary key (ampere));

show create table avs_mcc_7;

drop table avs_mcc_7;

desc mcc_7;
show create table mcc_7;

rename table avs_mcc_7 to avs_7;

desc avs_7;

create table avs_7 (
id int not null auto_increment,
name varchar(100),
ampere float not null default 0,
temperature float not null default 0,
created_at timestamp default now(),
-- constraint fk_detail_avs_mcc_7_id foreign key (id) references mcc_7(id),
-- constraint fk_detail_avs_mcc_7_name foreign key (name) references mcc_7(name),
primary key (id));

truncate detail_avs_mcc_7;

select * from detail_avs_mcc_7 limit 7,7;
select * from detail_avs_mcc_7;
drop table detail_avs_mcc_7;

desc detail_avs_mcc_7;

alter table detail_avs_mcc_7
add constraint fk_detail_name_mcc_7 foreign key (name) references mcc_7(name);

alter table detail_avs_mcc_7
add constraint fk_detail_ampere_avs foreign key (ampere) references avs_7(ampere);

alter table mcc_7
add index mcc_7_name (name);

desc detail_avs_mcc_7;

select * from mcc_7;

show create table detail_avs_mcc_7;

update mcc_7
set name = "Spare" where name is null;

desc mcc_7;

select * from mcc_7;

desc mcc_7;

desc detail_avs_mcc_7;

insert into detail_avs_mcc_7 (name, ampere, temperature) values 
("Spare", 10.2, 54.6);


use mcc_pm3;

show create table detail_avs_mcc_7;


select name from MCC_7 where name = "Spare";
select id from MCC_7 where name = "Spare";

update MCC_7
set name = CONCAT(name, id) where name = "Spare";

update MCC_7
set name = "Spare" where id = 6;

select id from mcc_7 order by id asc;

rollback;   

select * From detail_avs_mcc_7;

select * from detail_avs_mcc_7 limit 0, 6;
select * from detail_avs_mcc_7 limit 6, 6;
select * from detail_avs_mcc_7 limit 12, 6;


truncate detail_avs_mcc_7;

-- AVS MCC 1 ------------  

use mcc_pm3;

create table avs_1 (
id int not null auto_increment,
name varchar(100),
ampere float not null default 0,
temperature float not null default 0,
created_at timestamp default now(),
primary key (id));

show tables;

select * from mcc_1;

select * from avs_1;

truncate avs_1;

update mcc_1
set name = "Cooling-Gearbox" where id = 10;

select id, name from mcc_1 where name is null;

update MCC_1
set name = "Spare" where name is null;

update MCC_1
set name = CONCAT(name, id) where name = "Spare";

select name from mcc_1 where name is null;

select id, name from mcc_1 where name is null;

update mcc_1
set name = "Spare" where id = 3;

show tables;

select * from avs_mcc_7;

truncate avs_mcc_7;

select id, name from mcc_2 where name is null;

update mcc_2
set name = "Spare" where name is null;

update MCC_2
set name = CONCAT(name, id) where name = "Spare";



-- MEMBUAT TABLE MCC SP3 TOTAL //
use mcc_pm3;

-- MCC D
create table mcc_d like mcc_master;
desc mcc_d;
-- INSERT INTO MCC D
insert into MCC_D
(name, power, ampere, pole, funcloc) values

("P-01", 75, 145, 4, "FP-01-SP3-OCC-PU01-P001"),
("P-16", 132, 242, 4, "FP-01-SP3-OCC-T008-P014"),
("SP-31-B", 110, 205, 4, "FP-01-SP3-OCC-T043-VP10"),
("P-76", 90,	165, 4, "FP-01-SP3-WRS-T028-P042"),
("P-43", 37, 70, 4, "FP-01-SP3-RJS-T029-P043"),
("Spare", null, null, null, null),
("P-71-A", 75, 129, 4, "FP-01-SP3-RJS-T092-P094");

-- MCC B
create table mcc_b like mcc_master;
desc mcc_b;
-- INSERT INTO MCC B
insert into MCC_B
(name, power, ampere, pole, funcloc) values

("SP-01",	11,	23.5,	4, "FP-01-SP3-OCC-CN01"),
("SP-31",	15	,35	,4	, "FP-01-SP3-OCC-TH01"),
("SP-32",	15,	30.7, 	4, 	"FP-01-SP3-OCC-TH03"),
("Spare4", null, null, null, null),			
("P-46",	45,	86,	4,	"FP-01-PM3-BRS-T038-P063"),
("Spare6", null, null, null, null),			
("Spare7", null, null, null, null);

insert into MCC_B
(name, power, ampere, pole, funcloc) values

("Spare8", null, null, null, null),
("AG-10",	22,	46.4,	6,	"FP-01-SP3-OCC-T010-A010"),
("AG-20", 22,	46.4,	6,	"FP-01-SP3-RJS-T019-A015"),
("RJ-03-A", 37,	71,	4,	"FP-01-SP3-RJS-RU02"),
("AG-11",	22,	46.5,	6,	"FP-01-SP3-OCC-T011-A011"),
("P-24",	11,	24,	6,	"FP-01-SP3-OCC-T016-P027"),
("Spare14", null, null, null, null);			

insert into MCC_B
(name, power, ampere, pole, funcloc) values

("P-20",	45,	86,	4,	"FP-01-SP3-OCC-T010-P018"),
("P-21",	18.5,	36,	4,	"FP-01-SP3-OCC-T011-P019"),
("SP-31-C",	45,	93,	4,	"FP-01-SP3-OCC-T044-P067"),
("P-23",	30,	59,	4,	"FP-01-SP3-OCC-T014-P025"),
("P-23-A", null, null, null, null),			
("Spare20", null, null, null, null),
("Spare21", null, null, null, null);			
	
insert into MCC_B
(name, power, ampere, pole, funcloc) values

("P-22",	45,	86,	4,	"FP-01-SP3-OCC-T015-P026"),
("RJ-02",	0.37,	1.1,	4,	"FP-01-SP3-OCC-SR11"),
("SP-22",	55,	105,	4,	"FP-01-SP3-OCC-SR03"),
("P-4-3", 	null, null, null, null),			
("P-41",	5.5,	11.6,	4,	"FP-01-SP3-RJS-T019-P033"),
("P-18",	30,	59,	4,	"FP-01-SP3-OCC-T008-P016"),
("BLOWER-VP-10", null, null, null, null);				

insert into MCC_B
(name, power, ampere, pole, funcloc) values

("P-83",	11,	22,	4,	"FP-01-SP3-RJS-T017-P030"),
("SP-20", 	55,	105,	4,	"FP-01-SP3-OCC-SR02"),
("P-70-A", 	18,	36,	4, "FP-01-SUM-PUMP"),	
("P-53",	11,	23,	4,	"FP-01-SP3-OCC-T025-P038"),
("P-48",	30,	59,	6,	"FP-01-SP3-OCC-T006-P011"),
("RJ-01",	5.5,	11.6,	4,	"FP-01-SP3-OCC-SR09"),
("Spare35", 	null, null, null, null);

insert into MCC_B
(name, power, ampere, pole, funcloc) values

("AG-06",	55,	108,	6,	"FP-01-SP3-OCC-T006-A008"),
("AG-15", 	55,	108,	6,	"FP-01-SP3-OCC-T015-A013"),
("AG-16",	55,	108,	6,	"FP-01-SP3-OCC-T016-A014"),
("SP-29",	55,	105,	4,	"FP-01-SP3-OCC-SR07"),
("SP-30",	55,	105,	4,	"FP-01-SP3-OCC-SR08"),
("Spare41", 	null, null, null, null),			
("Spare42", 	null, null, null, null);				


-- MCC C
create table mcc_c like mcc_master;
desc mcc_c;
-- INSERT INTO MCC C
insert into MCC_C
(name, power, ampere, pole, funcloc) values

("P-08",	110,	210,	4,	"FP-01-SP3-OCC-T002-P006"),
("AG-21",	75,	143,	6,	"FP-01-SP3-APS-T020-A016"),
("SP-10",	75,	143,	6,	"FP-01-SP3-OCC-PU02-HYPG"),
("P-03",	55,	105,	4,	"FP-01-SP3-OCC-PU02-P003"),
("P-09",	132,	241,	4,	"FP-01-SP3-OCC-T003-P007"),
("Spare6", 	null, null, null, null);			

insert into MCC_C
(name, power, ampere, pole, funcloc) values

("AG-04-A",	75,	143,	6,	"FP-01-SP3-OCC-T004-A005"),
("AG-04-B",	75,	143,	6,	"FP-01-SP3-OCC-T004-A006"),
("SP-21",	55,	105,	4,	"FP-01-SP3-OCC-SR02"),
("SP-27",	110,	210,	6,	"FP-01-SP3-OCC-SR05"),
("P-07",	110,	205,	4,	"FP-01-SP3-OCC-T001-P005"),
("Spare12", 	null, null, null, null);				

insert into MCC_C
(name, power, ampere, pole, funcloc) values

("P-50",	45,	86,	4,	"FP-01-SP3-OCC-T012-P022"),
("P-70",	75,	140,	4,	"FP-01-SP3-RJS-T092-P092"),
("P-10",	90,	160,	4,	"FP-01-SP3-OCC-T005-P010"),
("P-17",	75,	144,	4,	"FP-01-SP3-OCC-T008-P015"),
("SP-09",	75,	143,	6,	"FP-01-SP3-OCC-PU01-HYPG"),
("Spare18", 	null, null, null, null);			

insert into MCC_C
(name, power, ampere, pole, funcloc) values

("RJ-04-A",	1.1,	3.75,	4,	"FP-01-SP3-OCC-TH08-GB1"),
("RJ-04-B",	1.1	,3.75,	4,	"FP-01-SP3-OCC-TH08-GB2");

-- MCC A
create table mcc_a like mcc_master;
desc mcc_a;
-- INSERT INTO MCC A
insert into MCC_A
(name, power, ampere, pole, funcloc) values

("Spare1", 110, null, null, null),			
("P-39",	37,	71,	4,	"FP-01-SP3-OCC-T016-P028"),
("Spare3", 55, null, null, null),			
("Spare4", 110, null, null, null),			
("AG-02",	37,	74,	6,	"FP-01-SP3-OCC-T002-A002"),
("AG-03-B",	55,	108,	6,	"FP-01-SP3-OCC-T003-A004");


insert into MCC_A
(name, power, ampere, pole, funcloc) values

("Spare7", 110, null, null, null),					
("Spare8", 37, null, null, null),				
("AG-14",	55,	108,	6,	"FP-01-SP3-OCC-T014-A012"),
("SP-11",	5.5,	12,	4,	"FP-01-SP3-OCC-PU01-SLPG"),
("Spare11", 7.5, null, null, null),			
("SP-02",	11,	25,	4,	"FP-01-SP3-OCC-CN02"),
("Spare13", 55, null, null, null);

insert into MCC_A
(name, power, ampere, pole, funcloc) values

("AG-07",	7.5,	16,	6,	"FP-01-SP3-OCC-T007-A009"),
("SP-12",	5.5,	12,	4,	"FP-01-SP3-OCC-PU02-SLPG"),
("SP-25",	11,	21.5,	4,	"FP-01-SP3-OCC-TH04-GB1"),
("Spare17", 11, null, null, null),				
("Spare18", 45, null, null, null),				
("AG-03-A",	55,	108,	6,	"FP-01-SP3-OCC-T003-A003"),
("P-02",	5.5,	11.6,	4,	"FP-01-SP3-OCC-PU01-P002"),
("Spare21", 5.5, null, null, null),				
("P-05",	11,	21.5,	4,	"FP-01-SP3-OCC-CL02-P192"),
("P-11",	37,	74,	4,	"FP-01-SP3-OCC-SR04-P076"),
("SP-13/14", 5.5, null, null, null),				
("P-13",	55,	105,	4,	"FP-01-SP3-OCC-T004-P008"),
("Spare26", 22, null, null, null),				
("P-12",	30,	59,	4,	"FP-01-SP3-OCC-T007-P012"),
("P-19",	45,	93,	4,	"FP-01-SP3-OCC-T009-P017"),
("Spare29", 11, null, null, null),				
("Spare30", 45, null, null, null),				
("P-14",	55,	105,	4,	"FP-01-SP3-OCC-T004-P009"),
("Spare32", 37, null, null, null),				
("AG-01",	37,	74,	6,	"FP-01-SP3-OCC-T001-A001"),
("P-43",	37,	70,	4,	"FP-01-SP3-RJS-T029-P043"),
("AG-05",	37,	74,	6,	"FP-01-SP3-OCC-T005-A007"),
("MCCB-Spare36", null, 160, null, null),				
("Spare37", 55, null, null, null);	

-- MCC_HTM_SP1
create table mcc_htm_sp1 like mcc_master;
desc mcc_htm_sp1;
-- INSERT INTO MCC mcc_htm_sp1
insert into mcc_htm_sp1
(name, power, ampere, pole, funcloc) values

("Incoming", null, null, null, null),
("SP-04",	600,	132,	4,	"FP-01-SP3-OCC-PU02-GB"),
("SP-23",	250,	59.2,	6,	"FP-01-SP3-OCC-FR01"),
("SP-03",	600,	132,	4,	"FP-01-SP3-OCC-PU01-GB"),
("SP-19",	300,	74.3,	6,	"FP-01-SP3-OCC-SR01"),
("P-15",    372,	89.3,	6,	"FP-01-SP3-OCC-T008-P013"),
("Spare7", null, null, null, null);


-- MCC_HTM_SP2
create table mcc_htm_sp2 like mcc_master;
desc mcc_htm_sp2;
-- INSERT INTO MCC mcc_htm_sp2
insert into mcc_htm_sp2
(name, power, ampere, pole, funcloc) values

("P-49",	250,	56.5,	4,	"FP-01-SP3-OCC-T012-P020"),
("Spare2", null, null, null, null),				
("SP-24",	250,	59.2,	6,	"FP-01-SP3-OCC-FR02"),
("Spare4", null, null, null, null);

-- MCC_HTM_PM1
create table mcc_htm_pm1 like mcc_master;
desc mcc_htm_pm1;
-- INSERT INTO MCC mcc_htm_pm1
insert into mcc_htm_pm1
(name, power, ampere, pole, funcloc) values

("VP-04",	132,	250,	6,	"FP-01-PM3-VAS-VP04"),
("VP-02",	410,	96.1,	6,	"FP-01-PM3-VAS-VP02"),
("Spare3", 50, null, null, null),
("VP-07",	600,	141,	6,	"FP-01-PM3-VAS-VP07"),
("VP-08",	600,	141,	6,	"FP-01-PM3-VAS-VP08"),
("VP-03",	300,	75,	6,	"FP-01-PM3-VAS-VP03"),
("VP-10",	300,	75,	6,	"FP-01-PM3-VAS-VP10");


-- MCC_HTM_PM2
create table mcc_htm_pm2 like mcc_master;
desc mcc_htm_pm2;
-- INSERT INTO MCC mcc_htm_pm2
insert into mcc_htm_pm2
(name, power, ampere, pole, funcloc) values

("Compressor",	300,	76.2,	6,	"FP-01-PM3-COM"),
("BR-08",	300,	74.3,	6,	"FP-01-PM3-BRS-T040-A024"),
("BR-09",	300,	74.3,	6,	"FP-01-PM3-BRS-T040-A024");

-- CREATE TABLE AVS MCC SP3 TOTAL
 create table avs_mcc_a like avs_master;
 create table avs_mcc_b like avs_master;
 create table avs_mcc_c like avs_master;
 create table avs_mcc_d like avs_master;
 
 
 create table avs_mcc_htm_pm1 like avs_master;
 create table avs_mcc_htm_pm2 like avs_master;
 
 create table avs_mcc_htm_sp1 like avs_master;
 create table avs_mcc_htm_sp2 like avs_master;
 
 
 
 
 
 
 -- MENAMBAH FOREIGN KEY KE AVS_MCC_*NAME
alter table avs_mcc_1
add constraint fk_avs_to_mcc_1 foreign key (name) references mcc_1(name);
 
alter table avs_mcc_2
add constraint fk_avs_to_mcc_2 foreign key (name) references mcc_2(name);

alter table avs_mcc_3
add constraint fk_avs_to_mcc_3 foreign key (name) references mcc_3(name);
 
alter table avs_mcc_5
add constraint fk_avs_to_mcc_5 foreign key (name) references mcc_5(name);
  
alter table avs_mcc_6
add constraint fk_avs_to_mcc_6 foreign key (name) references mcc_6(name);

alter table avs_mcc_7
add constraint fk_avs_to_mcc_7 foreign key (name) references mcc_7(name);

alter table avs_mcc_a
add constraint fk_avs_to_mcc_a foreign key (name) references mcc_a(name);

alter table avs_mcc_b
add constraint fk_avs_to_mcc_b foreign key (name) references mcc_b(name);

alter table avs_mcc_c
add constraint fk_avs_to_mcc_c foreign key (name) references mcc_c(name);

alter table avs_mcc_d
add constraint fk_avs_to_mcc_d foreign key (name) references mcc_d(name);

alter table avs_mcc_htm_sp1
add constraint fk_avs_to_mcc_htm_sp1 foreign key (name) references mcc_htm_sp1(name);

alter table avs_mcc_htm_sp2
add constraint fk_avs_to_mcc_htm_sp2 foreign key (name) references mcc_htm_sp2(name);

alter table avs_mcc_htm_pm1
add constraint fk_avs_to_mcc_htm_pm1 foreign key (name) references mcc_htm_pm1(name);

alter table avs_mcc_htm_pm2
add constraint fk_avs_to_mcc_htm_pm2 foreign key (name) references mcc_htm_pm2(name);

-- ALTER TABLE ADD COLUMN AREA 
alter table mcc_1
add column area enum("PM3", "PM7");
 
alter table mcc_2
add column area enum("PM3", "PM7");

alter table mcc_3
add column area enum("PM3", "PM7");
 
alter table mcc_5
add column area enum("PM3", "PM7");
  
alter table mcc_6
add column area enum("PM3", "PM7");

alter table mcc_7
add column area enum("PM3", "PM7");

alter table mcc_a
add column area enum("PM3", "PM7");

alter table mcc_b
add column area enum("PM3", "PM7");

alter table mcc_c
add column area enum("PM3", "PM7");

alter table mcc_d
add column area enum("PM3", "PM7");

alter table mcc_htm_sp1
add column area enum("PM3", "PM7");

alter table mcc_htm_sp2
add column area enum("PM3", "PM7");

alter table mcc_htm_pm1
add column area enum("PM3", "PM7");

alter table mcc_htm_pm2
add column area enum("PM3", "PM7");


-- SET AREA 
update mcc_1
set area = "PM3";

update mcc_2
set area = "PM3";

update mcc_3
set area = "PM3";
 
update mcc_5
set area = "PM3";
  
update mcc_6
set area = "PM3";

update mcc_7
set area = "PM3";

update mcc_a
set area = "PM3";

update mcc_b
set area = "PM3";

update mcc_c
set area = "PM3";

update mcc_d
set area = "PM3";

update mcc_htm_sp1
set area = "PM3";

update mcc_htm_sp2
set area = "PM3";

update mcc_htm_pm1
set area = "PM3";

update mcc_htm_pm2
set area = "PM3";
 
 
use mcc_pm3; 
 
 

-- TABLE USERS
create table users (
user varchar(255),
password varchar(255)
);

insert into users (user, password) values
("Doni Darmawan", "Doni"), 
("Sartika", "Sartika"),
("Jaka Kumoro", "Jaka"),
("Tri Wahyu Aji", "Aji"),
("Aldino Eka Putra", "Aldino"),
("Arif Sunari", "Arif"),
("Agung Setiawan", "Agung"),
("Yuda Septiawan", "Yuda"),
("Refli Hamdhan", "Refli"),
("Arief Rahman", "Arief"),
("Denis Capirosi Firmansyah", "Denis"),
("Aldi Hermawan", "Aldi"),
("Sigit Priyanto", "Sigit"),
("Erry Puji Anggoro", "Erry"),
("Saiful Bahri", "Saiful"),
("R Much Arief S", "Mbeat"),
("Hasan Badri", "Hasan"),
("Andi Kurnia Mulyana", "Andi"),
("Abdul Malik", "Malik"),
("Suryanto", "Suryanto"),
("Darminto", "Darminto"),
("Edi Supriadi", "Edi"),
("Rosiman", "Rosiman"),
("Tedy", "Tedy"),
("Guest", "Guest");
 
 
-- TABLE FINDING
 create table finding (
 id int not null auto_increment primary key,
 notif varchar(10),
 area varchar(4),
 funcloc varchar(50),
 equipment varchar(15),
 date DATETIME default current_timestamp,
 status enum("Prepared", "Monitoring", "Close"),
 description TEXT
 );
 
 insert into finding (area, status, description) values 
 ("PM3", "Prepared", "Module panas kemungkinan scun ngepong");
 
 select * from finding;

update finding
set notif = "8003324" where id = 1;
 
 insert into finding (area, status, description) values 
 ("PM3", "Prepared", "Area basah AC bocor");