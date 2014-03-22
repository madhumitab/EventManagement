#!/bin/bash
for value in $(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "select CONCAT_WS(':',eid,number_register_users,upperlimit) from Events where number_register_users<upperlimit")
do


eid=`echo $value|cut -d: -f1`
number_register_users=`echo $value|cut -d: -f2`
upperlimit=`echo $value|cut -d: -f3`
gap_limit=`expr $upperlimit - $number_register_users`
echo $value;
echo "Eid is $eid";
#echo "Reg no count is $number_register_users";
#echo "Upper limtit is $upperlimit";
#echo " Space can be resued is $gap_limit";
#echo "gap : $gap_limit";
for waitlist in $(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "select CONCAT_WS(':',eid,email_address,status,Status_Number) from Register where status='w' and eid=$eid")
do
#echo "ineer loop :$waitlist";
eid=`echo $waitlist|cut -d: -f1`
email=`echo $waitlist|cut -d: -f2`
status_i=`echo $waitlist|cut -d: -f3`
Status_Number=`echo $waitlist|cut -d: -f4`

#echo $email."\t".$status_i."\t".$Status_Number
Status_Number=`expr $Status_Number - $gap_limit`
echo "status after deduction $Status_Number"
if [ $Status_Number -le 0 ]
then
#echo " inside if $Status_Number nad eid is $eid and email : $email";
result=$(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "update Register set status ='r',Status_Number =0 where eid=$eid and email_address='$email'");
#echo $result
#echo " update Register set status='r' and Status_Number=0 where eid=$eid and email_address=$email";
echo "Change in waitlist status to registered status for the event Id : $eid "|mailx -r "noreply@b649project.eventmanagment.com"  -s "Wait List Status Change" $email
else
#echo "else loop  $Status_Number "
result=$(mysql --host=silo.cs.indiana.edu --user=b561f13_ggomatom --password=my+sql=b561f13_ggomatom b561f13_ggomatom -rN --execute "update Register set Status_Number=$Status_Number where eid=$eid and email_address='$email_address' and status='w'");
echo $result
fi

done
done
