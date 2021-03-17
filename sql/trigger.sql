use rfidsystem;

delimiter $$
create trigger sync_record after insert on jilu for each row
begin
    insert into warehouse.log (box) values ((select number from bangding where address = new.address));
    update box set status = 1 - status where id = (select number from bangding where address = new.address);
end $$

-- delimiter $$
-- create trigger sync_asso after insert on bangding for each row
-- begin
--     insert into warehouse.rfid (rfid, box) values (new.address, new.number);
-- end $$
