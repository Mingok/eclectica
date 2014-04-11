<html><head><script language="JavaScript">
function A(c,i)
{
document.getElementById(i).style.backgroundColor=c;
}
</script></head><body>
<table id="a" width="100%" border="1">
<tr id="f0" onClick="A('#FF0000',this.id);"><td>0,0</td><td>0,1</td></tr>
<tr id="f1" onClick="A('#00FF00',this.id);"><td>1,0</td><td>1,1</td></tr>
</table></body></html>