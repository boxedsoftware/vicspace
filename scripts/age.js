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
