use rfidsystem;

drop trigger if exists sync_record;

delimiter $$
create trigger sync_record after insert on jilu for each row
begin
    update warehouse.box set status = 1 - status where id = (select number from bangding where address = new.address);
    insert into warehouse.log (date, box, direction) values (now(), (select number from bangding where address = new.address), (select status from warehouse.box where id = (select number from bangding where address = new.address)));
end $$
