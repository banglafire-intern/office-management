---early bird
select * from attendances where day='2019-05-11' and status='present' order by start_time limit 1;

---sticky glue
select T.user_id, sec_to_time(max(time_spent)) as max_time_spent 
from (
select user_id, sum(time_to_sec(TIMEDIFF(end_time, start_time))) as time_spent
from attendances where day between '2020-05-11' and '2020-05-17' and 
status='present' group by user_id
) T  
group by user_id order by max_time_spent desc;

---missed by a few minutes
select * from attendances where status='present' and day='2020-05-11' and start_time between '09:00:01' and '09:20:00' order by start_time limit 1;

---add policy
insert into policies(policy_id, name) values (1, "first year");

---remove policy
delete from policies where policies.policy_id = 1;
delete from leaves where leaves.policy_id = 1;

---add leave
insert into leaves(leave_id, name, days, type, policy_id) values(1, "sick", 3, "unpaid", 1);

---remove leave
delete from leaves where leaves.leave_id=2;

---take attendance
insert into attendances(id, user_id, day, status, start_time, end_time, reason_id) values (1, 1, '2020-05-11', 'absent', '09:00:00', '17:00:00', 1);

---fetch absent reasons
select * from reasons;

---set & update user_status
insert into user_status (user_id, status) values (1, true);
update user_status set status=0 where user_id=1;

---set & update remainings
insert into remainings(user_id, leave_id, days) values(1, 3, 10);
update remainings set days=2 where leave_id=3;

---insert & fetch messages
insert into messages(id, from_user_id, to_user_id, message, sent_time) values(1, 1, 2, "hi", now());
select * from messages where from_user_id=1 and to_user_id=2;

---leave requests
---user requests to admin or insert in the `leave_requests` table, approve_status -> approved, rejected, pending
insert into leave_requests(id, leave_id, user_id, start_date, end_date, approve_status);
---admin sees all leave requests 
select * from leave_requests order by id desc;
---admin update `approve_status` of the leave_requests
update leave_requests set approve_status='approved' where leave_id=1;
