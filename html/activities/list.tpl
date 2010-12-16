<html>
<head>
<meta http-equiv="Content-Language" content="tr" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="/js/jquery-1.4.3.js"></script>
 <script type="text/javascript" src="/js/admin.js"></script> 
</head>
<body>
<table border="1">
    <tr>
        <td></td>
        <td>Etkinlik Başlığı  </td>
        <td></td>
        <td></td>
        <td>etkinlikler</td>
    </tr>
        {section name=rows loop=$activities }
                {assign var="event" value=$activities[rows]->events}
    <tr>
        <td>-</td>
        <td valign="top">{$activities[rows]->title} </td>
        <td valign="top"><a href="?mod=addEvent&id={$activities[rows]->id}">etkinlik ekle</a></td>
        <td valign="top"><a href="?mod=delete&id={$activities[rows]->id}">sil</a></td>
        <td valign="top">
            <table border="1">
                    <tr>
                        <td>Mekan</td>
                        <td>Tarih</td>
                        <td></td>
                    </tr>

                    {foreach from=$event item=foo}
                    <tr>
                        <td>{$foo.scene}</td>
                        <td>{$foo.date}</td>
                        <td><a href="?mod=eventDelete&id={$foo.id}">sil</a></td>
                    </tr>
                    {/foreach}
            </table>

        </td>
    </tr>
    {/section}

</table>
</body>

</html>
