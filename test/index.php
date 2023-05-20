<html>
    <head>
                <script>
            function myHide()
            {
                document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
                document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
            }
            </script>
    </head>
    <body onload="myHide();">  
            <div id="hidepage2" style="display:block;" align="center" width="100%">
            <br>
            <IMG SRC="loading.gif" WIDTH="100" HEIGHT="100" BORDER="0" ALT=""><br>
            กรุณารอสักครู่...
            </div>

            <div id="hidepage" style="display:none;">
            <table>
            <tr><td>หน้าเพจโหลดเสร็จแล้ว</td></tr>
            </table>
            </div>

    </body>
</html>