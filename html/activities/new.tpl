<html>
<head>
<meta http-equiv="Content-Language" content="tr" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="/js/jquery-1.4.3.js"></script>
 <script type="text/javascript" src="/js/admin.js"></script> 
</head>
<body>
<form action="" method="post" id="newActivities" enctype="multipart/form-data">
<table>
    <tr>
        <td>Etkinlik Başlığı : </td>
        <td><input type="text" name="name" id="name"></td> 
    </tr>
    <tr>
        <td valign="top">Etkinlik Açıklaması : </td>
        <td><textarea rows="5" cols="20" name="description" id="desc" > </textarea> </td>
    </tr>
    <tr>
        <td valign="top">Etkinlik Tarihi(gün-ay-yil saat:dk) : </td>
        <td>
            <input type="text" size="2" maxlength="2" name="day" /> -
            <input type="text" size="2" maxlength="2" name="mounth" />-
            <input type="text" size="4" maxlength="4" name="year" />
            <input type="text" size="2" maxlength="2" name="hour" />:
            <input type="text" size="2" maxlength="2" name="min" />
        </td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td>  {html_options name=category id=cat options=$cats }</td>

    </tr>
    <tr>
        <td valign="top">Fotolar : </td>
        <td>
         <input type="file" id="img1" name="img1"> <br>
         <input type="file" id="img2" name="img2"> <br>
         <input type="file" id="img3" name="img3"> <br>
         <input type="file" id="img4" name="img4"> <br>
         <input type="file" id="img5" name="img5"> <br>
         <input type="hidden" value="1" name="upfile" /> <br>
         </td>
    </tr>

    <tr>
         <td colspan="2" align="right">  <input type="button" value="Kaydet" id="yallah"></td>
    </tr>
</table>
</form>
</body>

</html>
