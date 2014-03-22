#!/bin/bash
for value in $(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "select eid from Events where number_register_users<lowerlimit and  substr(start_time,1,10)=curdate()")
do

echo "eid : $value";
owner=$(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "select owner from Events where eid=$value")
echo "owner is $owner";
echo "event $value posted by $owner(you) has low attendence which is planned to be hosted today. please visit http://www.cs.indiana.edu/cgi-pub/ggomatom/eventdes.php?eid=$value to check  current status.If you wish to delete the event please visit my account page.Thanks for your time and patience.<br> Regards, <br> Event Management Team"|mailx -r "noreply@b649project.eventmanagment.com" -s "Low Attendance alert for the today's event hosted by you" $owner

done
