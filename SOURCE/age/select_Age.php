<html>
    <head>
        <script language="javascript">
            function dgi(el)
            {
                return document.getElementById(el);
            }
            var aYear = 100;
            window.onload = function()
            {
                var y = dgi('year');
                var d = new Date();
                var _y = d.getFullYear();
 
                var _o = document.createElement('option');
                _o.setAttribute('value', 0);
                _o.innerHTML = 'Year';
                y.appendChild(_o);
 
                for(var i = 0; i < aYear; i++)
                {
                    var o = document.createElement('option');
                    o.setAttribute('value', _y);
                    o.innerHTML = _y;
                    y.appendChild(o);
                    _y--;
                }
            }
            function loadMonths(obj)
            {
                if(obj.value != '0')
                {
                    dgi('month').style.display = '';
                }
                else
                {
                    dgi('month').style.display = 'none';
                }
            }
            function loadDays(obj)
            {
                var days = dgi('day');
 
                if(obj.value != '0')
                {
                    clearDays();
                    var number = 32 - new Date(parseInt(dgi('year').value), parseInt(dgi('month').value)-1, 32).getDate();
 
                    for(var i = 1; i <= number; i++)
                    {
                        var o = document.createElement('option');
                        o.setAttribute('value', i);
                        o.innerHTML = i;
                        days.appendChild(o);
                    }
                    days.style.display = '';
                }
                else
                {
                    clearDays();
                    hideDays();
                }
            }
            function clearDays()
            {
                var days = dgi('day');
                days.innerHTML = '';                
            }
 
            function hideDays()
            {
                var days = dgi('day');
                days.style.display = 'none';
            }
 
        </script>
    </head>
    <body>
    <form action='get_Age.php' method='POST'>
    <table border="1">
        <tr>
        <td><select name="month" id="month"  onchange="loadDays(this);">
            <option value="0">Month</option>
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select></td>
        <td><select name="day" id="day"></select></td>
        <td><select name="year" id="year" onchange="loadMonths(this);">
        </select></td>
        </table>
        <input type='submit' value="Submit">
        </form>
    </body>
</html>