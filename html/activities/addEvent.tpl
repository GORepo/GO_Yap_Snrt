<html>
<head>
<meta http-equiv="Content-Language" content="tr" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="/js/jquery-1.4.3.js"></script>
</head>
<body>
<form action="" method="post" id="newActivities" >
<table>
    <tr>
        <td>Etkinlik  : </td>
        <td>{$name}
        <input type="hidden" name="eId" value="{$id}">
         <input type="hidden" name="addEvent" value="1">
        </td>
    </tr>
    <tr>
        <td valign="top">Etkinlik Tarihi(gün-ay-yil saat:dk) : </td>
        <td>
            <input type="text" size="2" maxlength="2" name="day" /> -
            <input type="text" size="2" maxlength="2" name="mounth" />-
            <input type="text" size="4" maxlength="4" name="year" />
            <input type="text" size="2" maxlength="2" name="hour" />:
            <input type="text" size="2" maxlength="2" name="min"  value="00"/>
        </td>
    </tr>
    <tr>
        <td valign="top">Etkinlik Fiyatı : </td>
        <td><input type="text"  name="price" id="price"> </td>
    </tr>
    <tr>
        <td valign="top">Bilet Satış Yerleri : </td>
        <td><input type="text"  name="ticketSales" id="ticketSales"> </td>
    </tr>
    <tr>
        <td valign="top">Etkinlik Yerleri : </td>
        <td><input type="text"  name="scene" id="scene"> </td>
    </tr>
    
    <tr>
         <td colspan="2" align="right">  <input type="submit" value="Kaydet" id="yallah"></td>
    </tr>
</table>
</form>
</body>

</html>
