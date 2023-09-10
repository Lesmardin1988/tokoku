<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<script language='javascript' type='text/javascript'>
monthnames = new Array(
"Januari",
"Februari",
"Maret",
"April",
"Mei",
"Juni",
"Juli",
"Agustus",
"September",
"Oktober",
"Nopember",
"Desember");
var linkcount=0;
function addlink(month, day, href) {
var entry = new Array(3);
entry[0] = month;
entry[1] = day;
entry[2] = href;
this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;
linkdays = new Array();
linkdays.addlink(3, 1, "03-01");
linkdays.addlink(3, 2, "03-02");
linkdays.addlink(3, 3, "03-03");
linkdays.addlink(3, 4, "03-04");
linkdays.addlink(3, 5, "03-05");
linkdays.addlink(3, 6, "03-06");
linkdays.addlink(3, 7, "03-07");
linkdays.addlink(3, 8, "03-08");
linkdays.addlink(3, 9, "03-09");
linkdays.addlink(3, 10, "03-10");
linkdays.addlink(3, 11, "03-11");
linkdays.addlink(3, 12, "03-12");
linkdays.addlink(3, 13, "03-13");
linkdays.addlink(3, 14, "03-14");
linkdays.addlink(3, 15, "03-15");
linkdays.addlink(3, 16, "03-16");
linkdays.addlink(3, 17, "03-17");
linkdays.addlink(3, 18, "03-18");
linkdays.addlink(3, 19, "03-19");
linkdays.addlink(3, 20, "03-20");
linkdays.addlink(3, 21, "03-21");
linkdays.addlink(3, 22, "03-22");
linkdays.addlink(3, 23, "03-23");
linkdays.addlink(3, 24, "03-24");
linkdays.addlink(3, 25, "03-25");
linkdays.addlink(3, 26, "03-26");
linkdays.addlink(3, 27, "03-27");
linkdays.addlink(3, 28, "03-28");
linkdays.addlink(3, 29, "03-29");
linkdays.addlink(3, 30, "03-30");
linkdays.addlink(3, 31, "03-31");
linkdays.addlink(4, 1, "04-01");
linkdays.addlink(4, 2, "04-02");
linkdays.addlink(4, 3, "04-03");
linkdays.addlink(4, 4, "04-04");
linkdays.addlink(4, 5, "04-05");
linkdays.addlink(4, 6, "04-06");
linkdays.addlink(4, 7, "04-07");
linkdays.addlink(4, 8, "04-08");
linkdays.addlink(4, 9, "04-09");
linkdays.addlink(4, 10, "04-10");
linkdays.addlink(4, 11, "04-11");
linkdays.addlink(4, 12, "04-12");
linkdays.addlink(4, 13, "04-13");
linkdays.addlink(4, 14, "04-14");
linkdays.addlink(4, 15, "04-15");
linkdays.addlink(4, 16, "04-16");
linkdays.addlink(4, 17, "04-17");
linkdays.addlink(4, 18, "04-18");
linkdays.addlink(4, 19, "04-19");
linkdays.addlink(4, 20, "04-20");
linkdays.addlink(4, 21, "04-21");
linkdays.addlink(4, 22, "04-22");
linkdays.addlink(4, 23, "04-23");
linkdays.addlink(4, 24, "04-24");
linkdays.addlink(4, 25, "04-25");
linkdays.addlink(4, 26, "04-26");
linkdays.addlink(4, 27, "04-27");
linkdays.addlink(4, 28, "04-28");
linkdays.addlink(4, 29, "04-29");
linkdays.addlink(4, 30, "04-30");
linkdays.addlink(5, 1, "05-01");
linkdays.addlink(5, 2, "05-02");
linkdays.addlink(5, 3, "05-03");
linkdays.addlink(5, 4, "05-04");
linkdays.addlink(5, 5, "05-05");
linkdays.addlink(5, 6, "05-06");
linkdays.addlink(5, 7, "05-07");
linkdays.addlink(5, 8, "05-08");
linkdays.addlink(5, 9, "05-09");
linkdays.addlink(5, 10, "05-10");
linkdays.addlink(5, 11, "05-11");
linkdays.addlink(5, 12, "05-12");
linkdays.addlink(5, 13, "05-13");
linkdays.addlink(5, 14, "05-14");
linkdays.addlink(5, 15, "05-15");
linkdays.addlink(5, 16, "05-16");
linkdays.addlink(5, 17, "05-17");
linkdays.addlink(5, 18, "05-18");
linkdays.addlink(5, 19, "05-19");
linkdays.addlink(5, 20, "05-20");
linkdays.addlink(5, 21, "05-21");
linkdays.addlink(5, 22, "05-22");
linkdays.addlink(5, 23, "05-23");
linkdays.addlink(5, 24, "05-24");
linkdays.addlink(5, 25, "05-25");
linkdays.addlink(5, 26, "05-26");
linkdays.addlink(5, 27, "05-27");
linkdays.addlink(5, 28, "05-28");
linkdays.addlink(5, 29, "05-29");
linkdays.addlink(5, 30, "05-30");
linkdays.addlink(5, 31, "05-31");
linkdays.addlink(6, 1, "06-01");
linkdays.addlink(6, 2, "06-02");
linkdays.addlink(6, 3, "06-03");
linkdays.addlink(6, 4, "06-04");
linkdays.addlink(6, 5, "06-05");
linkdays.addlink(6, 6, "06-06");
linkdays.addlink(6, 7, "06-07");
linkdays.addlink(6, 8, "06-08");
linkdays.addlink(6, 9, "06-09");
linkdays.addlink(6, 10, "06-10");
linkdays.addlink(6, 11, "06-11");
linkdays.addlink(6, 12, "06-12");
linkdays.addlink(6, 13, "06-13");
linkdays.addlink(6, 14, "06-14");
linkdays.addlink(6, 15, "06-15");
linkdays.addlink(6, 16, "06-16");
linkdays.addlink(6, 17, "06-17");
linkdays.addlink(6, 18, "06-18");
linkdays.addlink(6, 19, "06-19");
linkdays.addlink(6, 20, "06-20");
linkdays.addlink(6, 21, "06-21");
linkdays.addlink(6, 22, "06-22");
linkdays.addlink(6, 23, "06-23");
linkdays.addlink(6, 24, "06-24");
linkdays.addlink(6, 25, "06-25");
linkdays.addlink(6, 26, "06-26");
linkdays.addlink(6, 27, "06-27");
linkdays.addlink(6, 28, "06-28");
linkdays.addlink(6, 29, "06-29");
linkdays.addlink(6, 30, "06-30");

monthdays = new Array(12);
monthdays[0]=31;
monthdays[1]=28;
monthdays[2]=31;
monthdays[3]=30;
monthdays[4]=31;
monthdays[5]=30;
monthdays[6]=31;
monthdays[7]=31;
monthdays[8]=30;
monthdays[9]=31;
monthdays[10]=30;
monthdays[11]=31;

var todayDate = new Date();

thisday=todayDate.getDay();
thismonth=todayDate.getMonth();
thisdate=todayDate.getDate();
thisyear=todayDate.getYear();
thisyear = thisyear % 100;
thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
if (((thisyear % 4 == 0)
&& !(thisyear % 100 == 0))
||(thisyear % 400 == 0)) monthdays[1]++;
startspaces=thisdate;
while (startspaces > 7) startspaces-=7;
startspaces = thisday - startspaces + 1;
if (startspaces < 0) startspaces+=7;
document.write("<table border=0 cellspacing=1 cellpadding=0");
document.write("bordercolor=#666666 width=100%><font color=Black>");
document.write("<tr bgcolor=WHITE><td height=20 colspan=7><center><strong><font color=Black size=3>"
+ monthnames[thismonth] + " " + thisyear
+ "</font></strong></center></font></td></tr>");
document.write("<tr>");
document.write("<td bgcolor=#FF0000 align=center><font color=WHITE size=1 color=red>M</font></td>");
document.write("<td bgcolor=#0000FF align=center><font color=WHITE  size=1>S</font></td>");
document.write("<td bgcolor=#0000FF align=center><font color=WHITE   size=1>S</font></td>");
document.write("<td bgcolor=#0000FF align=center><font color=WHITE  size=1>R</font></td>");
document.write("<td bgcolor=#0000FF align=center><font color=WHITE  size=1>K</font></td>");
document.write("<td bgcolor=GREEN align=center><font color=WHITE  size=1 color=green>J</font></td>");
document.write("<td bgcolor=#0000FF align=center><font color=WHITE  size=1>S</font></td>");
document.write("</tr>");
document.write("<tr>");
for (s=0;s<startspaces;s++) {
document.write("<td  bgcolor=#FFFFFF> </td>");
}
count=1;
while (count <= monthdays[thismonth]) {
        for (b = startspaces;b<7;b++) {
                linktrue=false;
                document.write("<td bgcolor=#FFFFFF align=center><font color=Black size=1>");
                for (c=0;c<linkdays.length;c++) {
                        if (linkdays[c] != null) {
                                if ((linkdays[c][0]==thismonth + 1) && (linkdays[c][1]==count)) {
                                        //document.write("<a href=\"kalender.php?op=sman1&tanggal=2007-" + linkdays[c][2] + "\">");
                                        linktrue=true;
                                    }
                                   }
                        }
                if (count <= monthdays[thismonth]) {
                        if (b==0) {
                                document.write("<font color=red>");}
                        if (b==5) {
                                document.write("<font color=green>");}
                        if (count==thisdate) {
                                document.write("<table width=89% border=0 cellspacing=0 cellpadding=0><tr bgcolor=blue><td><font size=1 color=white>");}

                        document.write(count);

                        if (count==thisdate) {
                                document.write("</font></td><tr></table>");}
                        if (b==0){
                                document.write("</font>");}
                        if (b==5){
                                document.write("</font>");}

                        }
                else {
                document.write(" ");
                        }
                if (linktrue)
                        document.write("</a>");
                document.write("</font></td>");
                count++;
                }
        document.write("</tr>");
        document.write("<tr>");
        startspaces=0;
}
document.write("</table>");
</script>
</body>
</html>
